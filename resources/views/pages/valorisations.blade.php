@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/valorisation.css') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<!-- la section recherche -->

<!-- Contenu après le header fixe -->
<div class="after-header">
  <div class="container">
  <div class="page-header">
    <div class="page-title">
      <h1><span class="strong">VALORISATIONS</span></h1>
      <div class="underline"></div>
    </div>
    <!-- <div class="status-bar">
      <button type="button" class="status-button">En activité <span class="caret">▾</span></button>
    </div> -->
  </div>

  <div class="filters">
    <form method="get" action="#">
      <input type="text" name="q" class="filter-input" placeholder="Tapez ce que vous voulez ...">
      <select class="filter-select" name="organization">
        <option value="">Toutes les laboratoires</option>
        <option value="">Toutes les laboratoires</option>
        <option value="">Toutes les laboratoires</option>
        <option value="">Toutes les laboratoires</option>
      </select>
      <select class="filter-select" name="partner">
        <option value="">Tous les chercheurs</option>
        <option value="">Tous les  chercheurs</option>
        <option value="">Tous les  chercheurs</option>
      </select>
      <select class="filter-select" name="country">
        <option value="">Tous les pays</option>
        <option value="">Tous les pays</option>
        <option value="">Tous les pays</option>
      </select>
      <button class="submit-button" type="submit">Rechercher</button>
    </form>
  </div>
  </div>
</div>


<!-- valorisations trouvées -->
<section class="valorisations after-header" aria-labelledby="vals-title">
  <h4 id="vals-title">6 valorisations trouvées</h4>

  <!-- <div class="valorisation-grid">

    <a class="valorisation-card" href="detail-valorisation.html?id=1">
      <h5 class="valorisation-titre">Formation en rédaction de projet de recherche</h5>
      <p class="valorisation-date"><strong>Date :</strong> 04-04-2024</p>
      <div class="valorisation-tags">
        <span class="tag tag-produit">Produits générés</span>
      </div>
      <p class="valorisation-porteur"><strong>Porteur :</strong> COMPOARE Moussa</p>
    </a> -->

            <!-- <a class="valorisation-card" href="detail-valorisation.html?id=7">
        <h5 class="valorisation-titre">Plateforme numérique de gestion des systèmes scolaires</h5>
        <p class="valorisation-date"><strong>Date :</strong> 01-10-2024</p>
        <div class="valorisation-tags"><span class="tag tag-innovation">Innovations</span></div>
        <p class="valorisation-porteur"><strong>Porteur :</strong> BASSINGA Hervé</p>
        </a> -->

        <!-- <a class="valorisation-card" href="detail-valorisation.html?id=8">
        <h5 class="valorisation-titre">Estimation de la prévalence des anticorps anti‑SAR</h5>
        <p class="valorisation-date"><strong>Date :</strong> 27-06-2024</p>
        <div class="valorisation-tags"><span class="tag tag-produit">Produits générés</span></div>
        <p class="valorisation-porteur"><strong>Porteur :</strong> COMPAORE Moussa</p>
        </a> -->

        <!-- <a class="valorisation-card" href="detail-valorisation.html?id=9">
        <h5 class="valorisation-titre">Méthode hybride de dissertation en QCM avec correction</h5>
        <p class="valorisation-date"><strong>Date :</strong> 07-10-2024</p>
        <div class="valorisation-tags"><span class="tag tag-produit">Méthodes</span></div>
        <p class="valorisation-porteur"><strong>Porteur :</strong> KABORE André</p>
        </a> -->

        <!-- <a class="valorisation-card" href="detail-valorisation.html?id=10">
        <h5 class="valorisation-titre">Formation des incubés de Saria (ANVAR 2024)</h5>
        <p class="valorisation-date"><strong>Date :</strong> 29-11-2024</p>
        <div class="valorisation-tags"><span class="tag tag-innovation">Technologies</span></div>
        <p class="valorisation-porteur"><strong>Porteur :</strong> YAMEOGO Windyam Fidèle</p>
        </a> -->

        <!-- <a class="valorisation-card" href="detail-valorisation.html?id=11">
        <h5 class="valorisation-titre">Enigme de la forte prévalence des anticorps anti‑XYZ</h5>
        <p class="valorisation-date"><strong>Date :</strong> 29-01-2025</p>
        <div class="valorisation-tags"><span class="tag tag-produit">Produits générés</span></div>
        <p class="valorisation-porteur"><strong>Porteur :</strong> BASSINGA Somda</p>
        </a>
        </div> -->

        <nav class="vals-pagination" aria-label="Pagination">
            <a class="page-btn" href="#" aria-label="Précédent">«</a>
            <a class="page-btn is-active" href="#">1</a>
            <a class="page-btn is-green" href="#">2</a>
            <a class="page-btn is-green is-next" href="#" aria-label="Suivant">»</a>
        </nav>
</section>


@endsection
