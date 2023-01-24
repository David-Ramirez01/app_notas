<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [UsersController::class, 'register'])->name('users.register');

Route::post('/signup', [UsersController::class, 'signup'])->name('users.signup');

Route::get('/login', [UsersController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [UsersController::class, 'authenticate'])->name('users.auth');

Route::post('/logout', [UsersController::class, 'logout'])->name('users.logout');



Route::resource('notes', NotesController::class)->parameters(["notes" => "notes"])->middleware('auth');

Route::put('notes/completed/{id}', [NotesController::class, 'completed'])->name('notes.completed')->middleware('auth');
Route::get('/completed', [NotesController::class, 'notesCompleted'])->name('notes.nc')->middleware('auth');
