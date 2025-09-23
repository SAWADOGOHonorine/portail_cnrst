
@extends('layouts.app')

@section('title', 'Les chercheurs')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/chercheurs.css') }}">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<section class="enseignants-section" aria-labelledby="enseignants-title">
  <div class="container">
    <div class="page-title">
      <h1><span class="strong">ENSEIGNANTS</span> CHERCHEURS</h1>
      <div class="underline"></div>
    </div>

    <div class="status-bar">
      <button type="button" class="status-button">En activité <span class="caret">▾</span></button>
    </div>

    <div class="filters">
      <form method="GET" action="{{ route('chercheurs') }}">
        <input type="text" name="q" class="filter-input" placeholder="Tapez ce que vous voulez ...">
        <select name="ufr" class="filter-select">
          <option value="">Toutes les UFR</option>
          <option value=""> UFR/IFOAD</option>
          <option value=""> UFR/SH</option>
          <option value=""> UFR/SEA</option>
          <option value=""> UFR/SDS</option>
        </select>
        <select name="discipline" class="filter-select">
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
          <option value="">Toutes les disciplines</option>
        </select>
        <select name="labo" class="filter-select">
          <option value="">Tous les laboratoires</option>
        </select>
        <button type="submit" class="submit-button">Rechercher</button>
      </form>
    </div>

    <p class="section-count"><strong>4 enseignants chercheurs trouvés</strong></p>
    <div class="cards">
      <!-- Carte 1 -->
      <article class="card">
        <img src="#" alt="image1" class="avatar">
        <div class="title-row">
          <span class="badge badge--dr">Dr</span>
          <h3 class="name">YAMBA</h3>
        </div>
        <p class="role">Enseigants chercheurs</p>
        <p class="meta">Electroniciens</p>
        <p class="ufr">UFR/SEA</p>
      </article>

      <!-- Carte 2 -->
      <article class="card">
        <img src="#" alt="image2" class="avatar">
        <div class="title-row">
          <span class="badge badge--dr">Dr</span>
          <h3 class="name">BADINI / FOLANE Denise</h3>
        </div>
        <p class="role">Maître-Assistant</p>
        <p class="meta">Histoire et archéologie</p>
        <p class="ufr">UFR/SH</p>
      </article>

      <!-- Carte 3 -->
      <article class="card">
        <img src="#" alt="image3" class="avatar">
        <div class="title-row">
          <span class="badge badge--dr">Dr</span>
          <h3 class="name">BADO Dibié</h3>
        </div>
        <p class="role">Maître-Assistant</p>
        <p class="meta">Lettres modernes</p>
        <p class="ufr">UFR/LAC</p>
      </article>

      <!-- Carte 4 -->
      <article class="card">
        <img src="#" alt="image4" class="avatar">
        <div class="title-row">
          <span class="badge badge--dr">Dr</span>
          <h3 class="name">BADO Nébom</h3>
        </div>
        <p class="role">Maître-Assistant</p>
        <p class="meta">Physique</p>
        <p class="ufr">UFR/SEA</p>
      </article>
    </div>
  </div>
</section>
@endsection