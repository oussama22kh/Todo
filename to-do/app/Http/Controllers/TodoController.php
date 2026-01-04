<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, )
    {
        $user = $request->user();
        $todos = Todo::where('user_id', $user->id)->get(['id', 'name', 'body','status']);

        return view('home', compact('todos'));        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $user = $request->user();
        if (! $user) {
            return redirect()->route('login');
        }

        $todo = Todo::create([
            'name' => $data['name'],
            'body' => $data['body'] ?? null,
            'user_id' => $user->id,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Todo $todo)
    {
        $user = $request->user();
        if ($user->id !== $todo->user_id) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $todo= Todo::find($todo->id);
        return view('show', ['todo' => $todo]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Todo $todo)
    {
        $user = $request->user();
        if ($user->id !== $todo->user_id) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $todo= Todo::find($todo->id);
        return view('edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $user = $request->user();
        if ($user->id !== $todo->user_id) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $todo= Todo::find($todo->id);
        $todo->name = $request->input('name');
        $todo->body = $request->input('body');
        $todo->status = $request->input('status');
        $todo->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Todo $todo)
    {
        $user = $request->user();
        if ($user->id !== $todo->user_id) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        $todo->delete();
        return redirect()->route('home');
    }
}
