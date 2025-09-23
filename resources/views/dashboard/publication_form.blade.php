@extends('dashboard')  

@section('title', 'Ajouter une publication')

@section('content')
    <h2>📚 Ajouter une publication</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @include('dashboard.publication.partials.form')
@endsection
