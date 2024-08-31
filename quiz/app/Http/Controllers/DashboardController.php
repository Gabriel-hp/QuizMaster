<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\score_tot;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->user()->id;

        // Obtém o total de questões respondidas pelo usuário
        $totalQuestionsAnswered = score_tot::where('user_id', $userId)->count();

        // Soma o score_total de todas as entradas do usuário
        $totalScore = score_tot::where('user_id', $userId)->sum('score_total');

        // Calcula a média de acertos
        $media = $totalQuestionsAnswered > 0 ? $totalScore / $totalQuestionsAnswered : 0;

        return view('dashboard', compact('totalQuestionsAnswered', 'totalScore', 'media'));
    }
}
