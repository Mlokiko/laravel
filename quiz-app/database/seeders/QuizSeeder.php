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

        
        // Quiz 2
        $quiz2 = Quiz::create([
            'title' => 'Test 1',
            'description' => 'test 1 description'
        ]);

        $q1 = $quiz2->questions()->create([
            'text' => 'test?'
        ]);

        $q1->options()->create(['text' => 'test?', 'is_correct' => true]);
        $q1->options()->create(['text' => 'test!', 'is_correct' => false]);
        $q1->options()->create(['text' => 'TEST???', 'is_correct' => false]);

        $q2 = $quiz2->questions()->create([
            'text' => 'test?'
        ]);

        $q2->options()->create(['text' => 'test?', 'is_correct' => true]);
        $q2->options()->create(['text' => 'test!', 'is_correct' => false]);
        $q2->options()->create(['text' => 'TEST???', 'is_correct' => false]);


        // Quiz 3
        $quiz3 = Quiz::create([
            'title' => 'Best food',
            'description' => 'test 2 description'
        ]);

        $q1 = $quiz3->questions()->create([
            'text' => 'Owoce'
        ]);

        $q1->options()->create(['text' => 'maliny', 'is_correct' => true]);
        $q1->options()->create(['text' => 'truskawki', 'is_correct' => false]);
        $q1->options()->create(['text' => 'czereśnie', 'is_correct' => false]);

        $q2 = $quiz3->questions()->create([
            'text' => 'obiadowe'
        ]);

        $q2->options()->create(['text' => 'spaghetti', 'is_correct' => true]);
        $q2->options()->create(['text' => 'kurczak z rozna', 'is_correct' => false]);
        $q2->options()->create(['text' => 'pierogi', 'is_correct' => false]);
    }
}