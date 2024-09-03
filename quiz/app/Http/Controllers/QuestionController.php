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
        $temas = ['FGV', 'Redes', 'Fundação Cesgranrio'];
        return view('quiz_options', compact('categories', 'temas'));
    }
    
    public function showQuiz(Request $request)
    {
        $categories = $request->input('categories', []); // Recebe um array de categorias
        $quantity = $request->input('quantity', 10); // Default para 10 perguntas se não especificado
        $tema = $request->input('tema'); // Recebe o tema ou a banca 
    
        // Se não houver categorias selecionadas, retornar uma resposta de erro ou redirecionar
        if (empty($categories)) {
            return redirect()->route('quiz.select')->withErrors('Selecione pelo menos uma categoria.');
        }
    
        // Filtra as perguntas pelo tema e categorias selecionadas
        $questions = Question::where('tema', $tema)
                             ->whereIn('subject', $categories)
                             ->inRandomOrder()
                             ->take($quantity)
                             ->get();
    
        // Salva os IDs das perguntas na sessão
        $questionIds = $questions->pluck('id')->toArray();
        session(['quiz_questions' => $questionIds]);
    
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
        // Verifique se o usuário está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para ver o resultado.');
        }
    
        // Obtenha os IDs das perguntas do quiz da sessão
        $questionIds = session('quiz_questions', []);
    
        // Obtenha as questões baseadas nos IDs armazenados na sessão
        $questions = Question::whereIn('id', $questionIds)->get();
    
        // Obtenha o ID do usuário logado
        $userId = auth()->user()->id;
    
        // Obtenha as respostas do usuário para as questões filtradas
        $userAnswers = UserAnswer::where('user_id', $userId)
            ->whereIn('question_id', $questionIds)
            ->pluck('selected_option', 'question_id')
            ->toArray();
    
        // Calcule a pontuação
        $score = 0;
        foreach ($questions as $question) {
            // Verifique se a resposta do usuário é igual à resposta correta
            if (isset($userAnswers[$question->id]) && $userAnswers[$question->id] == $question->correct_option) {
                $score++;
            }
        }
    
        // Retorne a view com as questões, respostas do usuário e a pontuação
        return view('result', [
            'questions' => $questions,
            'userAnswers' => $userAnswers,
            'score' => $score,
            'totalQuestions' => count($questions) // Passa o total de perguntas para a view
        ]);
    }
    

    



}

