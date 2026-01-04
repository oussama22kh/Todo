<div class="min-h-screen bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Todo</title>
        @vite('resources/css/app.css')
    </head>
    <body>
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Todo</h1>

        <form action="{{ route('todo.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Title
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $todo->name) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                    required

                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea
                    id="body"
                    name="body"
                    rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('body') border-red-500 @enderror"
                >{{ old('body', $todo->body) }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>
                <select
                    id="status"
                    name="status"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                >
                    <option value="pending" {{ old('status', $todo->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in progress" {{ old('status', $todo->status) === 'in progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $todo->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="flex-1 inline-flex items-center justify-center icon-btn primary tooltip"
                    aria-label="Update"
                >
                    <i class="fa-solid fa-check" aria-hidden="true"></i>
                    <span class="tooltip-text">Update</span>
                </button>
                <a
                    href="{{ route('home') }}"
                    class="flex-1 inline-flex items-center justify-center icon-btn secondary tooltip"
                    aria-label="Cancel"
                >
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                    <span class="tooltip-text">Cancel</span>
                </a>
            </div>
        </form>
    </div>
</div>