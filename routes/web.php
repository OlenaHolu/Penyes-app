<?php

use App\Http\Controllers\CrewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    // Verificar el role_id del usuario y devolver la vista correspondiente
    if ($user->role_id === 1) {
        return view('dashboard_admin');
    } else {
        return view('dashboard_user');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// Rutas para la gestión de usuarios - solo accesibles para administradores
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/search-user', [UserController::class, 'search'])->name('users.search');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

});

// Rutas para la gestión de CREWS - solo accesibles para administradores
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/crews', [CrewController::class, 'index'])->name('crews.index');
    Route::get('/search-crew', [CrewController::class, 'search'])->name('crews.search');
    Route::get('/crews/{crew}/edit', [CrewController::class, 'edit'])->name('crews.edit');
    Route::put('/crews/{crew}', [CrewController::class, 'update'])->name('crews.update');
    Route::delete('/crews/{crew}', [CrewController::class, 'destroy'])->name('crews.destroy');
    Route::get('/crews/create', [CrewController::class, 'create'])->name('crews.create');
    Route::post('/crews', [CrewController::class, 'store'])->name('crews.store');

});

// Rutas de perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
