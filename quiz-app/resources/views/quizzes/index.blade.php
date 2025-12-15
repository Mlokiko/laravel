<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
    <h1 class="text-3xl font-bold mb-6">Available Quizzes</h1>
    <div class="grid gap-4">
        @foreach($quizzes as $quiz)
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold">{{ $quiz['title'] }}</h2>
                <p class="text-gray-600">{{ $quiz['description'] }}</p>
                <a href="{{ route('quiz.show', $quiz['id']) }}" class="text-blue-500 hover:underline mt-2 block">Start Quiz &rarr;</a>
            </div>
        @endforeach
    </div>
</body>
</html>