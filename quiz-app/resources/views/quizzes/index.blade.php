<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Available Quizzes</h1>
    <a href="{{ route('quizzes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Create New Quiz
    </a>
</div>
    <div class="grid gap-4">
        @foreach($quizzes as $quiz)
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold">{{ $quiz['title'] }}</h2>
                <p class="text-gray-600">{{ $quiz['description'] }}</p>
                <div class="mt-4 flex gap-3">
    <a href="{{ route('quiz.show', $quiz->id) }}" class="text-blue-600 font-bold hover:underline">
        Start Quiz &rarr;
    </a>
    
    <a href="{{ route('questions.create', $quiz->id) }}" class="text-gray-500 hover:text-gray-800 text-sm border-l pl-3">
        Manage Questions
    </a>
</div>
            </div>
    
            
        @endforeach
    </div>
</body>
</html>