<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('index');
});

Route::get('tasks', [TaskController::class, 'index']);
Route::get('tasks/create', [TaskController::class, 'create']);
Route::post('tasks/create', [TaskController::class, 'store']);
