<?php

use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\JoinRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCrewJoinController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DrawController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReactDrawController;
use App\Http\Controllers\UserCrewController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/wallet-content', [WalletController::class, 'getWalletContent']);

Route::get('/test-react', function () {
    return view('react'); 
});
Route::get('/draw-user-view', function () {
    return view('/user/draw/index'); 
});

// REACT API Routes
Route::get('/api/draw/years', [ReactDrawController::class, 'getYears']);
Route::get('/api/draw/locations', [ReactDrawController::class, 'getLocations']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    // Verificar el role_id del usuario y devolver la vista correspondiente
    if ($user->role_id === 1) {
        return view('/admin/dashboard');
    } else {
        return view('/user/dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search-crew', [CrewController::class, 'search'])->name('crews.search');


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
    Route::get('/crews/{crew}/edit', [CrewController::class, 'edit'])->name('crews.edit');
    Route::get('/crews/{crew}/users', [CrewController::class, 'showUsersList'])->name('crews.showUsers');
    Route::put('/crews/{crew}', [CrewController::class, 'update'])->name('crews.update');
    Route::delete('/crews/{crew}', [CrewController::class, 'destroy'])->name('crews.destroy');
    Route::get('/crews/create', [CrewController::class, 'create'])->name('crews.create');
    Route::post('/crews', [CrewController::class, 'store'])->name('crews.store');
    Route::get('/admin/payments', [PaymentController::class, 'showAdminView'])->name('admin.payments.index');
});

Route::get('crewsList', [CrewController::class, 'showCrewsList']);
Route::get('/crews/{crew}', [CrewController::class, 'showCrewInfo']);

Route::post('/joinCrew/{id}', [UserCrewController::class, 'joinCrew']);
Route::get('/userJoinRequests', [UserCrewController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/adminJoinRequests', [JoinRequestController::class, 'index'])->name('joinRequest.index');
    Route::post('/joinRequest/approve/{id}', [JoinRequestController::class, 'approve'])->name('joinRequest.approve');
    Route::post('/joinRequest/reject/{id}', [JoinRequestController::class, 'reject'])->name('joinRequest.reject');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/success', [PaymentController::class, 'success'])->name('payments.success');
});

// formulario de contacto
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// sorteo
Route::get('/draw/{year?}', [DrawController::class, 'show'])->name('draw.show');
Route::post('/draw', [DrawController::class, 'draw'])->name('draw.draw');
Route::delete('/draw/{year}', [DrawController::class, 'delete'])->name('draw.delete');


// Rutas de perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/deposit', [WalletController::class, 'deposit'])->name('wallet.deposit');
    Route::post('/wallet/pay', [WalletController::class, 'pay'])->name('wallet.pay');
});

require __DIR__ . '/auth.php';
