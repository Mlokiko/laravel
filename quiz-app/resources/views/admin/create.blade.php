<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Create New Quiz</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quizzes.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Quiz Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                Create Quiz
            </button>
            
            <a href="{{ route('home') }}" class="block text-center text-gray-500 mt-4 text-sm hover:underline">Cancel</a>
        </form>
    </div>
</body>
</html>