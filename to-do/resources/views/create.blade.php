<!DOCTYPE html>
<html lang="en">

<head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo</title>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Todo</h1>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-6">
                    <label for="body" class="block text-gray-700 font-bold mb-2">Body:</label>
                    <textarea id="body" name="body" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center icon-btn primary tooltip" aria-label="Create Todo">
                    <i class="fa-solid fa-plus" aria-hidden="true"></i>
                    <span class="tooltip-text">Create Todo</span>
                </button>
            </form>
        </div>
    </div>
</body>
</html>