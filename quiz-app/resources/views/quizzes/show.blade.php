<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">{{ $quiz->title }}</h1>
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Back to List</a>
        </div>
        <form action="{{ route('quiz.store', $quiz->id) }}" method="POST">
            @csrf
            
            @foreach($quiz->questions as $question)
                <div class="mb-6 bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-xl mb-4 text-gray-800">
                        {{ $loop->iteration }}. {{ $question->text }}
                    </h3>
                    
                    <div class="flex flex-col gap-3">
                        @foreach($question->options as $option)
                            <label class="flex items-center gap-3 p-3 border rounded cursor-pointer hover:bg-gray-50 transition">
                                <input type="radio" 
                                       name="answers[{{ $question->id }}]" 
                                       value="{{ $option->id }}"
                                       class="w-5 h-5 text-blue-600">
                                
                                <span class="text-gray-700">{{ $option->text }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition">
                Submit Answers
            </button>
        </form>
    </div>
</body>
</html>