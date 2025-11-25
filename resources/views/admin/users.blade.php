@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admindashboard.css') }}">
<style>
    /* Centrer le titre en vert */
    h1.title-users {
        text-align: center;
        color: #28a745;
        margin-bottom: 30px;
    }
</style>
@endpush

@section('title', 'Liste des utilisateurs')

@section('content')
<div class="container">
    {{-- Messages Laravel --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Header avec titre et bouton --}}
    <div class="users-header mb-3">
        <h1 class="title-users">Liste complète des utilisateurs</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">+ Créer un utilisateur</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $roleColors = [
                        'super_admin' => 'dark text-white',
                        'admin' => 'primary',
                        'directeur' => 'warning text-dark',
                        'directeur_institut' => 'secondary text-white',
                        'chef_departement' => 'info text-dark',
                        'DG' => 'info text-dark',
                        'DGA' => 'success text-dark',
                        'user' => 'secondary'
                    ];

                @endphp

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->last_name }} {{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->adresse }}</td>

                    {{-- Rôle --}}
                    <td>
                        @php
                            $roleClass = $roleColors[$user->role] ?? 'secondary';
                            $roleName = ucfirst(str_replace('_', ' ', $user->role));
                        @endphp
                        <span class="badge bg-{{ $roleClass }}">{{ $roleName }}</span>
                    </td>

                    {{-- Statut --}}
                    <td>
                        @if($user->status == 1)
                            <span class="badge bg-success">Actif</span>
                        @else
                            <span class="badge bg-danger">Désactivé</span>
                        @endif
                    </td>

                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>

                    <td>
                        {{-- Changement de rôle --}}
                        @if($user->id != auth()->id())
                            <form action="{{ route('admin.updateRole', $user->id) }}" method="POST" class="d-inline form-update-role">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <select name="role" class="form-select form-select-sm">
                                        @foreach($roleColors as $roleKey => $class)
                                            <option value="{{ strtolower($roleKey) }}" {{ strtolower($user->role) == strtolower($roleKey) ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $roleKey)) }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm">Appliquer</button>
                                </div>
                            </form>
                        @else
                            <span class="text-muted">Vous</span>
                        @endif

                        {{-- Actions --}}
                        <div class="mt-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm mb-1">Modifier</a>

                            @if($user->status == 1)
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline form-delete-user">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1">Désactiver</button>
                                </form>
                            @else
                                <form action="{{ route('admin.users.activate', $user->id) }}" method="POST" class="d-inline form-activate-user">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mb-1">Activer</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Notifications --}}
    <div class="mt-4">
        <h4>Notifications non lues ({{ auth()->user()->unreadNotifications->count() }})</h4>

        @php $unreadNotifications = auth()->user()->unreadNotifications; @endphp

        @if($unreadNotifications->count() > 0)
            <form action="{{ route('admin.notifications.read') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary mb-2">Marquer toutes comme lues</button>
            </form>

            <ul class="list-group">
                @foreach($unreadNotifications as $notification)
                    <li class="list-group-item">
                        {{ $notification->data['message'] ?? 'Nouvelle notification' }}
                    </li>
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
    // Confirmation : changement de rôle
    document.querySelectorAll('.form-update-role').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Confirmation',
                text: "Voulez-vous changer le rôle de cet utilisateur ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
            }).then(result => { if (result.isConfirmed) form.submit(); });
        });
    });

    // Désactiver utilisateur
    document.querySelectorAll('.form-delete-user').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Désactiver cet utilisateur ?',
                text: "Il ne pourra plus se connecter.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, désactiver',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
            }).then(result => { if (result.isConfirmed) form.submit(); });
        });
    });

    // Activer utilisateur
    document.querySelectorAll('.form-activate-user').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Activer cet utilisateur ?',
                text: "Il pourra de nouveau se connecter.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, activer',
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
            }).then(result => { if (result.isConfirmed) form.submit(); });
        });
    });

    // Toasters
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: '{{ session("success") }}',
            toast: true,
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: '{{ session("error") }}',
            toast: true,
            position: 'top-end',
            timer: 3000,
            showConfirmButton: false,
        });
    @endif
</script>
@endpush
