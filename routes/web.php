<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/users', function () {
    $users = User::all();
    return view('users')->with('users', $users);
});

Route::get('/search-user', function (Request $request) {
    $query = Request::get('query');

    // Buscar usuarios que coincidan con la consulta
    $users = User::where('name', 'like', '%' . $query . '%')
        ->get();

    return view('search-results')->with('users', $users);
});

Route::get('/users/{user}/edit', function ($user) {
    $user = App\Models\User::findOrFail($user);
    return view('user_edit', compact('user'));
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
