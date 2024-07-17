<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Models\Subtask;
use Illuminate\Http\Request;

class SubtaskController extends Controller
{
    public function index()
    {
        $subtasks = Subtask::all();
        return view('subtasks.index', compact('subtasks'));
    }

    public function storeSubtask(Request $request, $todolist_id)
    {
        $request->validate([
            'subtarea' => 'required|string|max:255',
        ]);
    
        $subtask = new Subtask();
        $subtask->todolist_id = $todolist_id;
        $subtask->subtarea = $request->subtarea;
        $subtask->save();
    
        return redirect()->back();
    }
    

   // Eliminar subtarea
    public function destroySubtask($id)
{
    $subtask = Subtask::findOrFail($id);
    $subtask->delete();

    return redirect()->back();
    }

 
    public function completeSubtask(Request $request, $id)
    {
        $subtask = Subtask::findOrFail($id);
        $subtask->complete = $request->complete;
        $subtask->save();

        return response()->json(['success' => true]);
    }
}








