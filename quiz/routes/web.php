<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', [QuestionController::class, 'store'])->name('create');
Route::get('/quiz', [QuestionController::class, 'showQuiz'])->name('quiz');
Route::post('/quiz', [QuestionController::class, 'processQuiz'])->name('process.quiz');
Route::get('/result', [QuestionController::class, 'showResult'])->name('result');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
