<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\UserAnswer;

class QuestionController extends Controller
{
    public function showQuiz()
    {
        $questions = Question::inRandomOrder()->take(10)->get(); // Seleciona 10 questões aleatórias
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

        return redirect()->route('result')->with('score', $score);
    }
    

    public function showResult()
    {
        return view('result', ['score' => session('score')]);
    }

    public function store(Request $request)
    {
    // Validação dos dados de entrada
    $request->validate([
        'question_text' => 'required|string|max:255',
        'option_a' => 'required|string|max:255',
        'option_b' => 'required|string|max:255',
        'option_c' => 'required|string|max:255',
        'option_d' => 'required|string|max:255',
        'correct_option' => 'required|string|in:A,B,C,D', // Valida se é uma das letras corretas
    ]);

    // Criação da nova questão
    Question::create([
        'question_text' => $request->input('question_text'),
        'option_a' => $request->input('option_a'),
        'option_b' => $request->input('option_b'),
        'option_c' => $request->input('option_c'),
        'option_d' => $request->input('option_d'),
        'correct_option' => $request->input('correct_option'), // Insere a letra da alternativa correta
    ]);

    return redirect()->back()->with('success', 'Questão criada com sucesso!');
}
}

