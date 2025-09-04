<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;

//  les Pages statiques
Route::get('/', function () {
    return view('pages.home');
});

// Route::get('/apropos', function () {
//     return view('about');
// })->name('about');

// Route::get('/programmes', function () {
//     return view('programms');
// })->name('programms');

Route::get('/actualites', function () {
    return view('news');
})->name('news');


// routes pour les pages gerer par pagecontroller

Route::get('/home', [PageController::class, 'home'])->name('home');
Route::get('/about/partenariat', [pageController::class, 'partenariat'])->name('about.partenariat');
// Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'send'])->name('contact.send');

Route::get('/programmes/recherche', [PageController::class, 'recherche']);
Route::get('/programmes/innovation', [PageController::class, 'innovation']);
Route::get('/programmes/partenariats', [PageController::class, 'partenariats']);

Route::get('/actualités/nationale', [PageController::class, 'nationale']);
Route::get('/actualités/internationale', [PageController::class, 'internationale']);

Route::get('/faq/inscription', [PageController::class, 'inscription']);
Route::get('/faq/financement', [PageController::class, 'financement']);

Route::get('/medias/photos', [PageController::class, 'photos']);
Route::get('/medias/videos', [PageController::class, 'videos']);


//  Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//  Authentification pour la connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

// route pour l'inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// route pourla déconnexion
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('logout_success', true);
})->name('logout');

//  route pour le mot de passe oublié 
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

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

// routes pour les pages supplémentaires du dashboard
Route::get('/accueil', function () {
    return view('partials.accueil');
})->name('accueil');

Route::get('/infos', function () {
    return view('partials.infos');
})->name('infos');

Route::get('/documentation/{section}', function ($section) {
    return view("partials.documentation.$section");
})->name('documentation.section');




