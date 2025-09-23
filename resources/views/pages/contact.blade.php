@extends('layouts.app')

@section('title', 'Nous contacter')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<section class="contact-section">
  <h2 class="title">NOUS CONTACTER</h2>

  <div class="contact-grid">

    <!-- Colonne 1 -->
    <div class="partners">
      <div class="card-header"><h3>Partenaires</h3></div>
      <a href="#">CNRST</a>
      <a href="#">ARES</a>
      <a href="#">Incub@io</a>
      <div style="height:20px"></div>
      <a href="#">O CNRST</a>
      <a href="#">ARES</a>
      <a href="#">Incub@io</a>
    </div>

    <!-- Colonne 2 -->
    <div class="center">
      <div class="card-header"><h3>CNRST</h3></div>
      <p class="big-email"><i class="fa-solid fa-envelope"></i> contact@cnrst.bf</p>
      <div class="social-links">
        <a href="#"><i class="fa-solid fa-earth-americas"></i> cnrst.bf</a>
        <a href="#"><i class="fa-brands fa-facebook"></i> facebook</a>
      </div>
    </div>

    <!-- Colonne 3 -->
    <div class="team">
      <div class="card-header"><h3>Équipe référente</h3></div>

      <h4 class="section-title">Superviseurs</h4>
      <p><strong>Pr KIENDREREOGO :</strong> <i class="fa-solid fa-phone"></i> (+226) 79 80 83 80</p>

      <h4 class="section-title">Administratif</h4>
      <p><strong>Dr OUEDRAOGO :</strong> <i class="fa-solid fa-phone"></i> (+226) 07 25 65 21</p>

      <h4 class="section-title">Technique</h4>
      <p><strong>M. Léonard M. SAWADOGO :</strong> <i class="fa-brands fa-whatsapp"></i> (+226) 71 67 36 51</p>
      <p><strong>M. Issoufou NIKIEMA :</strong> <i class="fa-brands fa-whatsapp"></i> (+226) 79 31 82 46</p>
    </div>

  </div>
</section>

@endsection



