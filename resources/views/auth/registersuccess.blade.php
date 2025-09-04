
@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <!-- Modal déclenché automatiquement -->
    <div class="modal fade show" id="successModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"> Compte créé avec succès</h5>
                </div>
                <div class="modal-body">
                    <p>Votre compte a été enregistré correctement.</p>
                    <p>Vous pouvez maintenant vous connecter avec votre email et mot de passe.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-success">Se connecter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Fond assombri pour modal -->
    <div class="modal-backdrop fade show"></div>
</div>
@endsection
