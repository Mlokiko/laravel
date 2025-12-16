<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Quiz
        $quiz = Quiz::create([
            'title' => 'Laravel Basics',
            'description' => 'A simple quiz to test your Laravel knowledge.'
        ]);

        // Add Question 1
        $q1 = $quiz->questions()->create([
            'text' => 'What is the command to start the server?'
        ]);
        
        // Add Options for Q1
        $q1->options()->create(['text' => 'php artisan serve', 'is_correct' => true]);
        $q1->options()->create(['text' => 'npm run dev', 'is_correct' => false]);
        $q1->options()->create(['text' => 'python manage.py runserver', 'is_correct' => false]);

        // Add Question 2
        $q2 = $quiz->questions()->create([
            'text' => 'Where are routes defined?'
        ]);
        
        $q2->options()->create(['text' => 'app/Http/Controllers', 'is_correct' => false]);
        $q2->options()->create(['text' => 'routes/web.php', 'is_correct' => true]);
    }
}
