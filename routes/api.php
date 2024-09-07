<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/userList', [App\Http\Controllers\UserController::class, 'userList']);
Route::post('/user-create', [App\Http\Controllers\UserController::class, 'userCreate']);
Route::delete('/user-delete/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
