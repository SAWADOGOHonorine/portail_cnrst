<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CvController;
use App\Http\Controllers\PartenairesController;
use App\Http\Controllers\ValorisationsController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\LaboratoireController;
use App\Http\Controllers\HomeController;

//  les Pages statiques
Route::get('/', [HomeController::class, 'index'])->name('home');


// route pour partenaires
Route::get('/partenaires', [PartenairesController::class, 'index'])->name('partenaires');
Route::get('/partenaires/{id}', [PartenairesController::class, 'show'])->name('partenaire.show');


Route::get('/valorisations', [ValorisationsController::class, 'index'])->name('valorisations');

// route pour les chercheurs
Route::get('/chercheurs', function () {
    return view('pages.chercheurs');
})->name('chercheurs');

// route pour le contact
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
// route pour credits
Route::get('/credits', function () {
    return view('pages.credit');
})->name('credit');

Route::get('/search', function () {
    return view('pages.search');
})->name('search');

//  Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// route pour la page d'accès refusé du dashboard
Route::get('/access-dashboard-refuse', function () {
    return view('error.accessdasboard_refuse');
})->name('access.dashboard.refuse');

//  Authentification pour la connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

// Route pour l'inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// route pourla déconnexion
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('logout.success');
})->name('logout');
Route::get('/logout_success', function () {
    return view('auth.logout_success'); 
})->name('logout.success');

//  route pour le mot de passe oublié 

Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); 
})->name('password.request');

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


// les routes pour le dossier mon_espace

// pour le cv
Route::get('/cv', [CvController::class, 'create'])->name('cv_form');
Route::post('/cv', [CvController::class, 'store'])->name('cv.store');
Route::get('/cv/download', [CvController::class, 'downloadPdf'])->name('cv.download');
Route::get('/mon_espace/cv_form', function () {
    return view('mon_espace.cv_form');
});

// ----------------------------
// Page publique (GET)
Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');

// ----------------------------
// Routes admin CRUD (POST, PUT, DELETE)
Route::middleware(['auth'])->group(function () {
    // Articles
    Route::get('/publications/create', [PublicationController::class, 'create'])->name('publications.create');
    Route::post('/publications', [PublicationController::class, 'store'])->name('publications.store');
    Route::get('/publications/{id}', [PublicationController::class, 'show'])->name('publications.show');
    Route::get('/publications/{publication}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
    Route::put('/publications/{publication}', [PublicationController::class, 'update'])->name('publications.update');
    Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])->name('publications.destroy');
});
    // ========================
    // Fiches
    // ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/mon_espace/fiches', [FicheController::class, 'index'])->name('fiches.index');
    Route::get('/mon_espace/fiches/create', [FicheController::class, 'create'])->name('fiches.create');
    Route::get('/fiches/{id}', [FicheController::class, 'show'])->name('fiches.show');
    Route::get('/mon_espace/fiches/{id}/edit', [FicheController::class, 'edit'])->name('fiches.edit');
    Route::post('/mon_espace/fiches', [FicheController::class, 'store'])->name('fiches.store');
    Route::put('/mon_espace/fiches/{id}', [FicheController::class, 'update'])->name('fiches.update');
    // Supprimer une fiche
    Route::delete('/mon_espace/fiches/{id}', [FicheController::class, 'destroy'])->name('fiches.destroy');
});


// Routes articles (dashboard privé)
Route::middleware(['auth'])->prefix('mon_espace')->group(function () {
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
    // Route::get('telecharger/{id}', [ArticleController::class, 'download'])->name('articles.download');
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
});

// route pour la page laboratoire
Route::get('/laboratoires', [LaboratoireController::class, 'index'])->name('laboratoires.index');
Route::get('/laboratoires/{id}', [LaboratoireController::class, 'show'])->name('laboratoires.show');












