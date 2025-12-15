<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        // Przykladowe dane
        $quizzes = [
        ['id' => 1, 'title' => 'PHP Basics', 'description' => 'Test your PHP knowledge'],
        ['id' => 2, 'title' => 'Laravel 101', 'description' => 'Intro to framework'],
    ];
        return view('quizzes.index');
    }

    public function show($id) {
        // Przykladowe dane
        $quiz = [
        'title' => 'PHP Basics',
        'questions' => [
            ['id' => 1, 'text' => 'What does PHP stand for?', 'options' => ['Personal Home Page', 'PHP: Hypertext Preprocessor']],
            ['id' => 2, 'text' => 'Is Laravel a PHP framework?', 'options' => ['Yes', 'No']]
        ]
    ];
        return view('quizzes.show', ['id' => $id]);
    }
}