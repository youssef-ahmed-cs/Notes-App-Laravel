<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')
    ->middleware('auth');
Route::post('/logout', function () {
    auth()->logout();
    return redirect()->route('register');
})->name('logout');


// Route::get('/note', [NoteController::class, 'index'])
//     ->name('note.index');

// Route::get('/note/create', [NoteController::class, 'create'])
//     ->name('note.create');

// Route::post('/note', [NoteController::class, 'index'])
//     ->name('note.store');

// Route::get('/note/{id}', [NoteController::class, 'show'])
//     ->name('note.show');

// Route::put('/note/{id}/edit', [NoteController::class, 'edit'])
//     ->name('note.edit');

// Route::put('/note/{id}', [NoteController::class, 'update'])
//     ->name('note.update');

// Route::delete('/note/{id}', [NoteController::class, 'destroy'])
//     ->name('note.destroy');


##resorces routes
Route::resource('note', NoteController::class)
->middleware('auth')->names('note');


