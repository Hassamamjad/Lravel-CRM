<?php

use Illuminate\Support\Facades\Route;




Route::get('/lead', function () {
    return view('lead');
});

Route::get('/client', function () {
    return view('client');
});







Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lead', [App\Http\Controllers\LeadController::class, 'index'])->name('lead');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');
Route::post('/chatSend', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat.send');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'taskCreate'])->name('tasks.store');
Route::post('/tasks/upload', [App\Http\Controllers\TaskController::class, 'testUpload'])->name('tasks.upload');
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/lead', [App\Http\Controllers\LeadController::class, 'index'])->name('lead');
Route::post('/lead/create', [App\Http\Controllers\LeadController::class, 'createLead'])->name('lead.store');
Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
Route::post('/client/create', [App\Http\Controllers\ClientController::class, 'createClient'])->name('client.store');




