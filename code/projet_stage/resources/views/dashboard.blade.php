
@extends('layouts.guest')

@section('content')
@if (session('status'))
    <div class="status-message">
        {{ session('status') }}
    </div>
@endif

<div class="form-login">
    <!-- <h2>Bienvenue sur votre tableau de bord ! </h2> -->
    <p>Votre compte a été créé avec succès.</p>
</div>
@endsection
