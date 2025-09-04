
@extends('layouts.app')

@section('content')
<div class="text-center mt-10">
    <h1 class="text-green-700 text-2xl font-bold"> Vous êtes connecté avec succès.</h1>
    <p class="mt-4">Bienvenue sur le portail CNRST. Vous pouvez accéder au dashboard quand vous êtes prêt.</p>
    <a href="{{ route('dashboard') }}" class="mt-6 inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">
        <!-- Aller au dashboard -->
    </a>
</div>
@endsection
