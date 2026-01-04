<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model {

    protected $fillable = ['name', 'body', 'status', 'user_id'];

    /**
     * The user who owns the todo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
