<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Todo::create([
            'name' => 'Sample Todo 1',
            'body' => 'This is the first sample todo item.',
            'status' => 'pending',
        ]);

        Todo::create([
            'name' => 'Sample Todo 2',
            'body' => 'This is the second sample todo item.',
            'status' => 'in progress',
        ]);

        Todo::create([
            'name' => 'Sample Todo 3',
            'body' => 'This is the third sample todo item.',
            'status' => 'completed',
        ]);

        Todo::create([
            'name' => 'Sample Todo 4',
            'body' => 'This is the fourth sample todo item.',
            'status' => 'pending',
        ]);
    }
}
