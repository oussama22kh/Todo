<!DOCTYPE>
<html lang="en">
<head>
@vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">        

</head>
<body>
<div class="container mx-auto min-h-screen bg-gray-50 py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="flex items-start gap-4 justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $todo->name }}</h1>
                <div class="text-gray-600 text-sm">{{ $todo->created_at->diffForHumans() ?? '' }}</div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('todo.edit', $todo->id) }}" class="action-btn tooltip" aria-label="Edit">
                    <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                    <span class="tooltip-text">Edit</span>
                </a>
                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Delete this todo?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn tooltip" aria-label="Delete">
                        <i class="fa-solid fa-trash" aria-hidden="true"></i>
                        <span class="tooltip-text">Delete</span>
                    </button>
                </form>
                <a href="{{ route('home') }}" class="action-btn tooltip" aria-label="Back">
                    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                    <span class="tooltip-text">Back</span>
                </a>
            </div>
        </div>

        <p class="text-gray-700 text-lg mb-6 mt-4">{{ $todo->body }}</p>
        
        <div class="mb-6 p-3 bg-blue-50 rounded border border-blue-200">
            <p class="text-gray-700"><span class="font-semibold">Status:</span> 
                <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">{{ $todo->status }}</span>
            </p>
        </div>
        
        <!-- Top actions are present above; keep those only for single view. Removed duplicate bottom actions. -->
    </div>
</div>
</body>
</html>