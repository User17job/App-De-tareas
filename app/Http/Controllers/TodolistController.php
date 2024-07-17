<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
 
class TodolistController extends Controller
{
    public function index()
    {
        $todolists = Todolist::with('subtasks')->get();
        return view('home', compact('todolists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tarea' => 'required|string|max:255',
        ]);

        Todolist::create([
            'tarea' => $request->tarea,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return redirect()->route('home');
    }

    public function complete(Request $request, $id)
    {
        $todolist = Todolist::findOrFail($id);
        $todolist->completed = !$todolist->completed;
        $todolist->save();
    
        return response()->json(['success' => true]);
    }
}
