<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index() {
        $quizzes = Quiz::all();
        return view('quizzes.index', compact('quizzes'));
    }

    public function show($id) {
        $quiz = Quiz::with('questions.options')->findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|exists:options,id'
        ]);

        $quiz = Quiz::with('questions.options')->findOrFail($id);

        $score = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($request->answers as $questionId => $optionId) {
            $option = \App\Models\Option::find($optionId);
            
            if ($option && $option->is_correct) {
                $score++;
            }
        }
        
        return "You scored $score out of $totalQuestions!";
    }
}