<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
    <h1 class="text-3xl font-bold mb-6">{{ $quiz['title'] }}</h1>
    
    <form action="" method="POST">
        @csrf
        @foreach($quiz['questions'] as $question)
            <div class="mb-6 bg-white p-4 rounded shadow">
                <h3 class="font-bold text-lg mb-2">{{ $loop->iteration }}. {{ $question['text'] }}</h3>
                <div class="flex flex-col gap-2">
                    @foreach($question['options'] as $option)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="answers[{{ $question['id'] }}]" value="{{ $option }}">
                            {{ $option }}
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Submit Answers</button>
    </form>
</body>
</html>