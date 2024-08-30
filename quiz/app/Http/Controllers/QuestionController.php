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

        foreach ($request->all() as $question_id => $selected_option) {
            $question = Question::find($question_id);

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

        // Atualiza a pontuação do usuário
        $user->update(['score' => $score]);

        return redirect()->route('result')->with('score', $score);
    }

    public function showResult()
    {
        return view('result', ['score' => session('score')]);
    }
}

