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

    public function create()
    {
        return view('admin.create');
    }

    public function storeQuiz(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $quiz = Quiz::create($validated);

        return redirect()->route('home');
    }

    public function createQuestion($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.questions.create', compact('quiz'));
    }

    public function storeQuestion(Request $request, $id)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'correct_option' => 'required|integer'
        ]);

        $quiz = Quiz::findOrFail($id);

        $question = $quiz->questions()->create([
            'text' => $request->question_text
        ]);

        foreach ($request->options as $index => $optionText) {
            $question->options()->create([
                'text' => $optionText,
                'is_correct' => ($index == $request->correct_option)
            ]);
        }
        return redirect()->route('questions.create', $quiz->id)
                         ->with('success', 'Question added! Add another one below.');
    }
}