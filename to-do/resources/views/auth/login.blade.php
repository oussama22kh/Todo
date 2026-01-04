<!DOCTYPE html>
<html lang="en">
<head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
<form action="{{route ('login.submit')}}" method="POST" class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md">
    @csrf
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    @if ($errors->any())
        <div class="mb-4 text-red-600 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
        <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-6">
        <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
        <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <button type="submit" class="w-full inline-flex items-center justify-center icon-btn primary tooltip" aria-label="Login">
        <i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i>
        <span class="tooltip-text">Login</span>
    </button>
    <div>
    <a href="{{ route('register') }}" class="block text-center text-blue-500 hover:underline mt-4">Don't have an account? Register</a>
    </div>
</form>
    </div>  
</body>     
</html>