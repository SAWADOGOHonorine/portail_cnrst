<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

//  la page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home'); 

//  Pages statiques
Route::view('/apropos', 'about')->name('about');
Route::view('/programmes', 'programms')->name('programms');
Route::view('/actualites', 'news')->name('news');
Route::view('/contact', 'contact')->name('contact');
// FAQ
Route::view('/faq', 'faq')->name('faq');

// Médias
Route::view('/medias', 'media')->name('media');
// Contacts (déjà défini)
Route::view('/contact', 'contact')->name('contact');

//  Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//  Authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

// route pour register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// route la deconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//  Mot de passe oublié
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//  Réinitialisation du mot de passe
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->name('password.update');

// routes des pages supplémentaires du dashboard
Route::get('/accueil', function () {
    return view('partials.accueil');
})->name('accueil');

Route::get('/infos', function () {
    return view('partials.infos');
})->name('infos');

Route::get('/documentation/{section}', function ($section) {
    return view("partials.documentation.$section");
})->name('documentation.section');




