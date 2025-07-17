<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;


// les routes

// route pour la page d'acceuil
Route::get('/', function () {
    return view('welcome');
});

//  route pour le dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route pour la connexion
Route::get('/connexion', function () {
    return view('auth.custom-login');
})->name('custom.login');

// route de mot de passe oublié
Route::get('/forgot-password', [PasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

// route pour register

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// route pour la connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



require __DIR__.'/auth.php';
