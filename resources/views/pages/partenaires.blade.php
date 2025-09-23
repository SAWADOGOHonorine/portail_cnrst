@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/partenaires.css') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<!-- la section recherche (style calqué sur la première section de chercheurs) -->

<!-- Contenu après le header fixe -->
<div class="after-header">
  <div class="container">
  <div class="page-header">
    <div class="page-title">
      <h1><span class="strong">PARTENAIRES</span></h1>
      <div class="underline"></div>
    </div>
    <!-- <div class="status-bar">
      <button type="button" class="status-button">En activité <span class="caret">▾</span></button>
    </div> -->
  </div>

  <div class="filters">
    <form method="get" action="#">
      <input type="text" name="q" class="filter-input" placeholder="Tapez ce que vous voulez ...">
      <select class="filter-select" name="country">
        <option value="">Tous les pays</option>
      </select>
      <select class="filter-select" name="organization">
        <option value="">Toutes les organisations</option>
      </select>
      <select class="filter-select" name="partner">
        <option value="">Tous les partenaires</option>
      </select>
      <select class="filter-select" name="partner">
        <option value="">Année</option>
        <option value="">Année</option>
        <option value="">Année</option>
      </select>
      <select class="filter-select" name="partner">
        <option value="">Statut</option>
         <option value="">Active</option>
          <option value="">Inactive</option>
      </select>
      <button class="submit-button" type="submit">Rechercher</button>
    </form>
  </div>
  </div>
</div>

<!-- SECTION PARTENAIRES -->
<section class="agreements" aria-labelledby="agreements-title">
  <h2 id="agreements-title" class="agreements-title">Nombres de partenariats trouvés</h2>

  <div class="agreements-grid">
    <!-- Carte 1 -->
    <article class="agreement-card">
      <a class="agreement-title" href="#">
        Accord cadre de coopération entre l'Université Joseph KI‑ZERBO
        et l'Université ABDELMALEK ESSAÂDI de Tétouan
      </a>
      <p class="agreement-meta">
        Domaine:
        <span class="tag">Enseignement</span>
        <span class="tag">Recherche</span>
        <span class="tag">Mobilité</span>
        <span class="tag">Expertise</span>
      </p>
    </article>

    <!-- Carte 2 -->
    <article class="agreement-card">
      <a class="agreement-title" href="#">
        Accord cadre de coopération entre l'Université Joseph KI‑ZERBO
        et l’Ecole Nationale d’Administration et de Magistrature
      </a>
      <p class="agreement-meta">
        Domaine:
        <span class="tag">Enseignement</span>
        <span class="tag">Mobilité</span>
        <span class="tag">Renforcement de capacité</span>
        <span class="tag">Expertise</span>
      </p>
    </article>

    <!-- Carte 3 -->
    <article class="agreement-card">
      <a class="agreement-title" href="#">
        Accord cadre de coopération interuniversitaire entre l'Université
        Catholique de Louvain et l'Université Joseph KI‑ZERBO
      </a>
      <p class="agreement-meta">
        Domaine:
        <span class="tag">Enseignement</span>
        <span class="tag">Recherche</span>
        <span class="tag">Mobilité</span>
        <span class="tag">Renforcement de capacité</span>
      </p>
    </article>

    <!-- Carte 4 -->
    <article class="agreement-card">
      <a class="agreement-title" href="#">
        Accord cadre de coopération interuniversitaire entre l'Université
        Saint Thomas d’Aquin et l’Université Joseph KI‑ZERBO
      </a>
      <p class="agreement-meta">
        Domaine:
        <span class="tag">Recherche</span>
      </p>
    </article>
  </div>
</section>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.partenaire-card');
        cards.forEach(card => {
            card.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                if (id) {
                    window.location.href = `/partenaires/${id}`;
                }
            });
        });
    });
</script>
@endpush


@endsection

