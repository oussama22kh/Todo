<!DOCTYPE>
<html lang="en">
<head>
@vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">        

</head>
<body>

<div class="min-h-screen bg-muted/40 py-10">
    <div class="w-full max-w-7xl mx-auto px-4 space-y-6">
        <form action="{{route ('logout')}}" method="POST" class="flex justify-end">
            @csrf
            <button type="submit" class="icon-btn primary tooltip" aria-label="Logout">
                <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
                <span class="tooltip-text">Logout</span>
            </button>
        </form>
        <!-- Page Title -->
            <div class="app-header" style="width:100%; justify-content: space-between;">
                <div style="display:flex; align-items:center; gap:1rem;">
                    <div class="title text-3xl text-foreground">To-Do List</div>
                </div>
                <div>
                    <a href="{{ route('create') }}" class="header-cta">Create Todo</a>
                </div>
            </div>

        <!-- Kanban Board -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $statuses = ['pending' => 'Pending', 'in progress' => 'In Progress', 'completed' => 'Completed'];
                $todosByStatus = collect($todos)->groupBy('status');
            @endphp

            @foreach ($statuses as $statusKey => $statusLabel)
                <div class="bg-gray-100 rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4 text-foreground">{{ $statusLabel }}</h2>
                    <div class="space-y-3">
                        @forelse ($todosByStatus->get($statusKey, []) as $item)
                            <div class="card" >
                                <div class="flex items-start gap-3">
                                    <div class="flex-1">
                                        <div class="flex items-start gap-3">
                                            <h3 class="card-title">{{ $item['name'] }}</h3>
                                            <div class="card-actions">
                                                <a href="{{ route('todo.show', $item['id']) }}" class="action-btn tooltip" aria-label="View">
                                                    <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                                    <span class="tooltip-text">View</span>
                                                </a>
                                                <a href="{{ route('todo.edit', $item['id']) }}" class="action-btn tooltip" aria-label="Edit">
                                                    <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                                                    <span class="tooltip-text">Edit</span>
                                                </a>
                                                <form action="{{ route('todo.destroy', $item['id']) }}" method="POST" onsubmit="return confirm('Delete this todo?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn tooltip" aria-label="Delete">
                                                        <i class="fa-solid fa-trash" aria-hidden="true"></i>
                                                        <span class="tooltip-text">Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="card-body">{{ $item['body'] }}</p>
                                        <div class="card-meta">
                                            @php $s = strtolower($item['status']); @endphp
                                            <span class="badge {{ $s == 'pending' ? 'pending' : ($s == 'completed' ? 'completed' : 'in-progress') }}">{{ ucfirst($item['status']) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted-foreground text-sm py-8">
                                No tasks
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

</body>
</html>

    <!-- FAB removed: Create button moved into header -->
