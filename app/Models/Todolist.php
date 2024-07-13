<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = ['tarea', 'completed'];

    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }
}
