<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\score_tot;

class QuestionController extends Controller
{
    public function selectQuizOptions()
    {
        $categories = ['Português', 'Informática', 'Raciocínio Lógico'];
        return view('quiz_options', compact('categories'));
    }

    public function showQuiz(Request $request)
        {
            $categories = $request->input('categories', []); // Recebe um array de categorias
            $quantity = $request->input('quantity', 10); // Default para 10 perguntas se não especificado

            // Se não houver categorias selecionadas, retornar uma resposta de erro ou redirecionar
            if (empty($categories)) {
                return redirect()->route('quiz.select')->withErrors('Selecione pelo menos uma categoria.');
            }

            $questions = Question::whereIn('subject', $categories) // Filtra por múltiplas categorias
                                ->inRandomOrder()
                                ->take($quantity)
                                ->get();

            return view('quiz', compact('questions'));
        }


    
    

    public function processQuiz(Request $request)
    {
        $score = 0;
        $user = auth()->user();

        // Filtra as respostas para remover o token CSRF e outros dados desnecessários
        $answers = $request->except('_token');

        foreach ($answers as $question_id => $selected_option) {
            $question = Question::find($question_id);

            if ($question) {
                // Armazena a resposta do usuário
                UserAnswer::create([
                    'user_id' => $user->id,
                    'question_id' => $question_id,
                    'selected_option' => $selected_option,
                ]);

                // Calcula a pontuação
                if ($question->correct_option == $selected_option) {
                    $score++;
                }
                      
            }
        }

        // Atualiza a pontuação do usuário
        $user->update(['score' => $score]);
        
             // Armazena a pontuação
             score_tot::create([
                'user_id' => $user->id,
                'score_total' => $score,
            ]);

        return redirect()->route('result')->with('score', $score);
    }
    

    public function showResult(Request $request)
{
    // Obtenha o ID do usuário logado
    $userId = auth()->user()->id;

    // Obtenha as questões e as respostas corretas do banco de dados
    $questions = Question::all();

    // Obtenha as respostas do usuário a partir do banco de dados
    $userAnswers = UserAnswer::where('user_id', $userId)->pluck('selected_option', 'question_id')->toArray();

    // Calcule a pontuação
    $score = 0;
    foreach ($questions as $question) {
        if (isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $question->correct_option) {
            $score++;
        }
    }

    // Retorne a view com as questões, respostas do usuário e a pontuação
    return view('result', compact('questions', 'userAnswers', 'score'));
   
}

}

