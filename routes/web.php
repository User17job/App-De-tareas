<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\SubtaskController;

Route::get('/', [TodolistController::class, 'index'])->name('home');
Route::post('/todolists', [TodolistController::class, 'store'])->name('store');
Route::delete('/todolists/{todolist}', [TodolistController::class, 'destroy'])->name('destroy');

Route::patch('/todolists/{todolist}/complete', [TodolistController::class, 'complete'])->name('complete');


Route::post('/subtask/{todolist_id}/store', [SubtaskController::class, 'storeSubtask'])->name('storeSubtask');
Route::delete('/subtask/{id}', [SubtaskController::class, 'destroySubtask'])->name('destroySubtask');

Route::patch('/subtask/{id}/complete', [SubtaskController::class, 'completeSubtask'])->name('completeSubtask');





// Route::patch('/todolists/{todolist}/complete', [TodolistController::class, 'complete'])->name('complete');
// Route::post('/subtask/{id}/complete', [SubtaskController::class, 'completeSubtask']);

// use App\Http\Controllers\TodolistController;
// use App\Http\Controllers\SubtaskController;

// // Ruta para mostrar la lista de tareas
// Route::get('/', [TodolistController::class, 'index'])->name('index');

// // Ruta para agregar una nueva tarea
// Route::post('/store', [TodolistController::class, 'store'])->name('store');

// // Ruta para eliminar una tarea
// Route::delete('/destroy/{id}', [TodolistController::class, 'destroy'])->name('destroy');

// // Ruta para agregar una subtarea
// Route::post('/add-subtask/{todolist}', [SubtaskController::class, 'store'])->name('add-subtask');

// // Ruta para eliminar una subtarea
// Route::delete('/delete-subtask/{subtask}', [SubtaskController::class, 'destroy'])->name('delete-subtask');
