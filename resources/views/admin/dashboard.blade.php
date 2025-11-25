@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endpush

@section('title', 'Tableau de bord')

@section('content')
<div class="container">
    <h1 class="mb-4">Bienvenue, {{ auth()->user()->first_name }} !</h1>

    {{-- Statistiques principales --}}
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Total utilisateurs</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger h-100">
                <div class="card-body">
                    <h5 class="card-title">Nouveaux aujourd'hui</h5>
                    <p class="card-text">{{ $todayUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-info h-100">
                <div class="card-body">
                    <h5 class="card-title">Notifications non lues</h5>
                    <p class="card-text">{{ $unreadNotifications->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary h-100">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">{{ $admins }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Dernières inscriptions --}}
    <h3 class="mb-3 text-center text-success">Dernières inscriptions</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Rôle</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestUsers as $user)
                <tr>
                    <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td>
                        @if($user->role == 'super_admin')
                            <span class="badge bg-dark">Super Admin</span>

                        @elseif($user->role == 'admin')
                            <span class="badge bg-primary">Admin</span>

                        @elseif($user->role == 'user')
                            <span class="badge bg-secondary">Utilisateur</span>

                        @elseif($user->role == 'directeur')
                            <span class="badge bg-warning text-dark">Directeur</span>

                        @elseif($user->role == 'Directeur_institut')
                            <span class="badge bg-secondary text-white">Directeur_institut</span>

                        @elseif($user->role == 'chef_departement')
                            <span class="badge bg-info text-dark">Chef_departement</span>

                        @elseif($user->role == 'dg')
                            <span class="badge bg-info text-dark">DG</span>

                        @elseif($user->role == 'dga')
                            <span class="badge bg-success text-dark">DGA</span>

                        @else
                            <span class="badge bg-light text-dark">Rôle inconnu</span>
                        @endif
                    </td>

                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($user->id != auth()->id())
                        <form action="{{ route('admin.updateRole', $user->id) }}" method="POST" class="d-inline form-update-role">
                            @csrf
                            @method('PUT')
                            <div class="d-flex gap-4">
                                <select name="role" class="form-select">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                                    <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>super_admin</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="directeur" {{ $user->role == 'directeur' ? 'selected' : '' }}>Directeur</option>
                                    <option value="dga" {{ $user->role == 'directeur_institut' ? 'selected' : '' }}>Directeur_institut</option>
                                    <option value="dg" {{ $user->role == 'dg' ? 'selected' : '' }}>DG</option>
                                    <option value="dga" {{ $user->role == 'dga' ? 'selected' : '' }}>DGA</option>
                                    <option value="dga" {{ $user->role == 'chef_departement' ? 'selected' : '' }}>chef_departement</option>
                                </select>
                                <button type="submit" class="btn btn-success btn-sm">Appliquer</button>
                            </div>
                        </form>
                        @else
                            <span class="text-muted">Vous</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Notifications non lues --}}
    <div class="mt-4">
        <h4>Notifications non lues ({{ $unreadNotifications->count() }})</h4>
        @if($unreadNotifications->count() > 0)
            <form action="{{ route('admin.notifications.read') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary mb-2">Marquer toutes comme lues</button>
            </form>
            <ul class="list-group">
                @foreach($unreadNotifications as $notification)
                    <li class="list-group-item">{{ $notification->data['message'] ?? 'Nouvelle notification' }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucune notification non lue.</p>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.form-update-role').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Confirmation',
            text: "Voulez-vous vraiment changer le rôle de cet utilisateur ?",
            icon: 'question',
            background: '#f8f9fa',
            color: '#212529',
            showCancelButton: true,
            confirmButtonText: 'Oui, appliquer',
            cancelButtonText: 'Annuler',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            customClass: {
                popup: 'rounded-4 shadow-lg',
                confirmButton: 'px-4 py-2 fw-bold',
                cancelButton: 'px-4 py-2 fw-bold'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Succès !',
    text: '{{ session('success') }}',
    toast: true,
    position: 'top-end',      // ← placé à l'intérieur de l'objet
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    background: '#ffffff',
    color: '#212529',
    iconColor: '#28a745',
    didOpen: (toast) => {
        toast.style.marginTop = '70px'; // décale le toast sous la navbar
        toast.style.zIndex = '9999';    // au-dessus de la navbar
    },
    customClass: {
        popup: 'swal-toast'
    }
})
@endif

@if(session('error'))
Swal.fire({
    icon: 'error',
    title: 'Erreur',
    text: '{{ session('error') }}',
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    background: '#fff',
    color: '#212529',
    iconColor: '#dc3545',
    didOpen: (toast) => {
        toast.style.marginTop = '70px';
        toast.style.zIndex = '9999';
    },
    customClass: {
        popup: 'swal-toast'
    }
})
@endif
</script>
@endpush


