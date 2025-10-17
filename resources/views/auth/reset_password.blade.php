@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/reset_password.css') }}">
@endpush
@section('content')
<div id="reset-password-wrapper">
    <div id="reset-password-form">
        <h2>Réinitialisation du mot de passe</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <label for="password">Nouveau mot de passe</label><br>
            <input type="password" name="password" id="password" required><br><br>

            <label for="password_confirmation">Confirmer le mot de passe</label><br><br>
            <input type="password" name="password_confirmation" id="password_confirmation" required>

            <button type="submit">Réinitialiser</button>
        </form>
    </div>
</div>
@endsection
