<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'index'])->name('home');
Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quiz.show');