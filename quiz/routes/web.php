<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('welcome');
});

// Rotas públicas
Route::get('/quiz/select', [QuestionController::class, 'selectQuizOptions'])->name('quiz.select');

// Grupo de rotas protegidas por middleware de autenticação
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Rota para criar questões (se for uma funcionalidade restrita)
    Route::get('/create', [QuestionController::class, 'store'])->name('create');
    
    // Rota para o dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    // Rotas do quiz
    Route::get('/quiz', [QuestionController::class, 'showQuiz'])->name('quiz');
    Route::post('/quiz', [QuestionController::class, 'processQuiz'])->name('process.quiz');
    
    // Rota para exibir o resultado do quiz
    Route::get('/result', [QuestionController::class, 'showResult'])->name('result');

    // Rota para o dashboard usando o DashboardController
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
