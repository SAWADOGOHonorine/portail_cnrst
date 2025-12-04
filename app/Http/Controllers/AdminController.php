<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cv;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationEmail;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    // DASHBOARD PRINCIPAL – REDIRECTION SELON RÔLE
    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    public function dashboard(Request $request)
    {
        $user = auth()->user();

        // Si c'est un simple utilisateur → Dashboard User
        if ($user->role === 'user') {

            // Détecter si l'utilisateur vient de la page CV
            $messageType = $request->query('from') === 'cv' ? 'from_cv' : 'welcome';

            return view('dashboard', compact('user', 'messageType'));
        }

        // Dashboard pour les rôles admins (admin, super_admin, directeur…)
        $latestUsers = User::latest()->take(5)->get();
        $totalUsers = User::count();
        $todayUsers = User::whereDate('created_at', now()->toDateString())->count();
        $admins = User::where('role', 'admin')->count();
        $unreadNotifications = auth()->user()->unreadNotifications;

        return view('admin.dashboard', compact(
            'latestUsers',
            'totalUsers',
            'todayUsers',
            'admins',
            'unreadNotifications'
        ));
    }

    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    // CRUD UTILISATEURS
    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    public function users()
    {
        $this->authorizeAdmin();
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        $this->authorizeAdmin();
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'role' => 'required|string|in:admin,user,super_admin,directeur,directeur_institut,chef_departement,DG,DGA',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
            'password'   => bcrypt(Str::random(12)),
            'status'     => 0,
            'activation_token' => Str::random(64),
        ]);

        Mail::to($user->email)->send(new ActivationEmail($user));

        return redirect()->route('admin.users')->with('success', "L'utilisateur {$user->first_name} {$user->last_name} a été créé.");
    }

    public function edit(User $user)
    {
        $this->authorizeAdmin();
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeAdmin();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,user,super_admin,directeur,directeur_institut,chef_departement,DG,DGA',
        ]);

        $user->update($request->only('first_name','last_name','email','role'));

        return redirect()->route('admin.users')->with('success', "Utilisateur modifié avec succès.");
    }

    public function destroy(User $user)
    {
        $user->status = 0; 
        $user->save();

        return redirect()->route('admin.users')
                         ->with('success', "L'utilisateur {$user->first_name} {$user->last_name} a été désactivé.");
    }

    public function activateUser(User $user)
    {
        $this->authorizeAdmin();
        $user->status = 1;
        $user->save();
        return redirect()->route('admin.users')->with('success', "Utilisateur activé.");
    }

    public function deactivateUser(User $user)
    {
        $this->authorizeAdmin();
        $user->status = 0;
        $user->save();
        return redirect()->route('admin.users')->with('success', "Utilisateur désactivé.");
    }

    // Dashboard user individuel
    public function userDashboard(Request $request)
    {
        $user = auth()->user();
        $messageType = $request->query('from') === 'cv' ? 'from_cv' : 'welcome';
        return view('dashboard.user', compact('user', 'messageType'));
    }

    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    // Vérification des rôles admin
    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    private function authorizeAdmin()
    {
        if (!in_array(auth()->user()->role, [
            'admin',
            'super_admin',
            'directeur',
            'directeur_institut',
            'chef_departement',
            'DG',
            'DGA'
        ])) {
            abort(403, 'Accès non autorisé');
        }
    }

    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    // GESTION DES CVS
    // ▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬
    public function cvs()
{
    $this->authorizeAdmin();
    $cvs = Cv::latest()->get();
    $user = auth()->user(); // récupère l'utilisateur connecté
    return view('admin.cvs', compact('cvs', 'user')); // passe $user à la vue
}

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,user,super_admin,directeur,directeur_institut,chef_departement,DG,DGA',
        ]);

        $user = User::findOrFail($id);

        if ($user->id == auth()->id()) {
            return redirect()->back()->with('error', "Vous ne pouvez pas changer votre propre rôle.");
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', "Le rôle de {$user->first_name} {$user->last_name} a été changé en {$user->role}.");
    }
}

