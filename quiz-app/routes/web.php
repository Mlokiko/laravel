<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'index'])->name('home');
Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/quiz/{id}', [QuizController::class, 'store'])->name('quiz.store');

Route::prefix('admin')->group(function () {
    Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes', [QuizController::class, 'storeQuiz'])->name('quizzes.store');
    Route::get('/quiz/{id}/questions/create', [QuizController::class, 'createQuestion'])->name('questions.create');
    Route::post('/quiz/{id}/questions', [QuizController::class, 'storeQuestion'])->name('questions.store');
});