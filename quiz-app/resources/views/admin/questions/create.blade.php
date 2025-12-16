<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Add Question to: {{ $quiz->title }}</h1>
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Done / Back to Home</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('questions.store', $quiz->id) }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label class="block font-bold mb-2">Question Text</label>
                <input type="text" name="question_text" class="w-full border p-2 rounded" required placeholder="e.g. What is 2 + 2?">
            </div>

            <h3 class="font-bold mb-2 text-gray-700">Answer Options</h3>
            <p class="text-sm text-gray-500 mb-4">Fill in the options and select the circle next to the correct one.</p>

            <div class="space-y-4 mb-6">
                
                <div class="flex items-center gap-3">
                    <input type="radio" name="correct_option" value="0" required class="w-5 h-5">
                    <input type="text" name="options[]" class="w-full border p-2 rounded" placeholder="Option 1" required>
                </div>

                <div class="flex items-center gap-3">
                    <input type="radio" name="correct_option" value="1" required class="w-5 h-5">
                    <input type="text" name="options[]" class="w-full border p-2 rounded" placeholder="Option 2" required>
                </div>

                <div class="flex items-center gap-3">
                    <input type="radio" name="correct_option" value="2" required class="w-5 h-5">
                    <input type="text" name="options[]" class="w-full border p-2 rounded" placeholder="Option 3" required>
                </div>

            </div>

            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-6 rounded hover:bg-blue-700">
                Save Question
            </button>
        </form>
    </div>
</body>
</html>