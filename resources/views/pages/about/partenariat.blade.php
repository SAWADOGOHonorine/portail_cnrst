@extends('layouts.app')

@section('title', 'aboutpartenariat')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/about_partenariat.css') }}">
@endpush

@section('about.partenariat')
<div>
    <section class="banner">
        <h1>Nos partenaires</h1>
        <a href="{{ route('home') }}">Accueil</a> &gt; <span>Partenariats</span>
    </section>
    <section class="partenariat-section">
        <div class="partenariat-container">
            <!-- <h2>PARTENARIAT</h2> -->
            <p class="partenariat-subtitle">Nos partenaires</p>

            <div class="partenariat-logos">
            <img src="/images/partenaires/prbhc.png" alt="PRBHC">
            <img src="/images/partenaires/france.png" alt="Ministère de l'Europe et des Affaires étrangères">
            <img src="/images/partenaires/senegal.png" alt="Sénégal">
            <img src="/images/partenaires/promab.png" alt="PROMAB">
            <img src="/images/partenaires/wate.png" alt="Wate">
            </div>
        </div>
    </section>

</div>
@endsection