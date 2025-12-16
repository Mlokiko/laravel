<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz App</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-slate-900 text-white h-screen flex flex-col items-center justify-center font-sans">

    <div class="max-w-xl mx-auto text-center px-4">
        <h1 class="text-6xl font-extrabold tracking-tight mb-4 text-blue-500 drop-shadow-lg">
            QUIZ APP
        </h1>
        <br><br>

        <div class="flex flex-col gap-4 w-full max-w-xs mx-auto">

            @if (Route::has('login'))
                @auth
                    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 shadow-xl">
                        <p class="text-gray-400 mb-4">Welcome back, <span class="text-white font-bold">{{ Auth::user()->name }}</span>!</p>
                        <a href="{{ route('home') }}" class="block w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105 text-center shadow-lg">
                            Go to Quizes
                        </a>
                    </div>
                @else
                    <a href="{{ route('home') }}" 
                       class="block w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105 text-center shadow-lg mb-2">
                        Anonymous
                    </a>

                    <a href="{{ route('login') }}" class="block w-full bg-gray-800 hover:bg-gray-700 text-gray-200 font-semibold py-3 px-6 rounded-lg border border-gray-600 transition text-center hover:text-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block w-full bg-transparent hover:bg-gray-800 text-gray-400 hover:text-white font-semibold py-3 px-6 rounded-lg border border-gray-700 transition text-center">
                            Create Account
                        </a>
                    @endif
                @endauth
            @endif

        </div>
    </div>

</body>
</html>