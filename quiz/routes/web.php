<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/quiz', [QuestionController::class, 'showQuiz'])->name('quiz');
    Route::post('/quiz', [QuestionController::class, 'processQuiz'])->name('process.quiz');
    Route::get('/result', [QuestionController::class, 'showResult'])->name('result');
});
