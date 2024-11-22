<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/', [TaskController::class, 'index'])->name('index');
Route::post('/add', [TaskController::class, 'add']);
Route::get('/delete/{id}', [TaskController::class, 'delete']);
Route::get('/edit/{id}', [TaskController::class, 'edit']);
Route::post('/update/{id}', [TaskController::class, 'update']);
Route::get('/register', [CategoryController::class, 'index']);

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/add', [CategoryController::class, 'add']);
Route::get('/delete/{id}', [CategoryController::class, 'delete']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
Route::post('/update/{id}', [CategoryController::class, 'update']);

Route::get('/user', function () {
    return view('user');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
