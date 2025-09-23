@extends('layouts.app')

@section('titre', 'Accueil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/accueil.css') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')
<div class="page-accueil">

  <!-- Barre de recherche -->
  <div class="search-bar">
    <input type="text" placeholder="Rechercher une publication, un chercheur..." />
    <button type="submit"><i class="bi bi-search"></i></button>
  </div>

  <div class="accueil-container">
    
    <!-- Bloc gauche : photo + infos -->
    <div class="profil-gauche">
      <img src="{{ asset('images/honorine.jpg') }}" alt="Photo Honorine" class="photo-profil">
      <h2 class="nom-profil">HONORINE</h2>
      <p class="domaine-profil">UX académique – Structuration institutionnelle – Portails nationaux</p>
    </div>

    <!-- Bloc centre : publications -->
    <div class="profil-centre">
      <h3 class="titre-section">Publications</h3>
      <ul class="liste-publications">
        <li>
          <strong>Modularité Blade pour portails publics</strong><br>
          <em>Honorine, 2025</em><br>
          Implémentation de partials Blade pour structuration académique.
        </li>
        <li>
          <strong>Comparaison UX : CNRST vs FONRID</strong><br>
          <em>Honorine, 2025</em><br>
          Étude comparative des pratiques UX sur portails nationaux.
        </li>
        <!-- Ajoute d'autres publications ici -->
      </ul>
    </div>

    <!-- Bloc droite : thématiques -->
    <div class="profil-droite">
      <h3 class="titre-section">Thématiques</h3>
      <ul class="liste-thematiques">
        <li>Anthropologie</li>
        <li>Communication</li>
        <li>Droit</li>
        <li>Économie</li>
        <li>Éducation</li>
        <li>Environnement</li>
        <li>Géographie</li>
        <li>Histoire</li>
        <li>Linguistique</li>
        <li>Littérature</li>
        <li>Philosophie</li>
        <li>Psychologie</li>
        <li>Santé</li>
        <li>Science politique</li>
        <li>Sociologie</li>
        <li>Travail social</li>
      </ul>
    </div>

  </div>
</div>
@endsection













































































































<!-- @extends('layouts.app')

@section('title', 'acceuil')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endpush

@section('home')
<div>
   <section class="apropos-section">
      <div class="apropos-gauche">
        <h2>Centre National de la Recherche Scientifique et Technologie</h2>
        <hr class="ligne-jaune">
        <p>Établissement public scientifique, le CNRST coordonne la recherche nationale via ses instituts spécialisés.</p>
        <p>Il soutient le développement durable par l’innovation scientifique.</p>
        <p>Sa mission : structurer, valoriser et diffuser la recherche au Burkina Faso.</p>
        <a href="https://fr.council.science/member/burkina-faso-centre-national-de-la-recherche-scientifique-et-technologique/" class="btn-jaune">En savoir plus</a>
      </div>

      <div class="apropos-droite">
        <img id="imageInstitutionnelle" src="{{ asset('images/image2.jpg') }}" alt="CNRST Burkina Faso">
      </div>
    </section> -->

    <!-- deuxieme section messsage de bienvenue -->
    <!-- <section class="sonasp-bienvenue">
        <section class="sonasp-bienvenue">
      <div class="bienvenue-container layout-texte-gauche">
        <div class="bienvenue-texte">
          <h2 class="titre-bienvenue">Message de bienvenue</h2>
          <h3 class="sous-titre-bienvenue">Directeur Général</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> <br>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br> <br>
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br> <br>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br> <br>
          </p>
          <div class="btn-lire-plus-container">
            <a href="#" class="btn-lire-plus">Lire plus <i class="fas fa-arrow-right" style="margin-left: 8px;"></i></a>
          </div>

        </div>

        <div class="bienvenue-photo">
          <img src="{{ asset('images/image1.jpg') }}" alt="image">
        </div>
      </div>
    </section>
 
    <!-- section des actualités -->
    <section class="actualites-cnrs">
      <h2 class="actualites-title">Nos actualités</h2>
      <p class="actualites-intro">Suivez les dernières initiatives du CNRST en matière de recherche, <br>innovation et partenariats institutionnels.</p>

      <div class="actualites-grid">
        <!-- Actualité 1 -->
        <div class="actualite-card">
          
          <div class="actu-image">
            <img src="{{ asset('images/image1.jpg') }}" alt="Lancement du programme STAG">
          </div>
          <div class="actu-date">20 juin 2024</div>
          <p>Le CNRST lance le programme STAG pour encadrer l’exploitation artisanale de l’or, en partenariat avec l’Artisanal Gold Council et SONASUCO.</p>
        </div>

        <!-- Actualité 2 -->
        <div class="actualite-card">
          
          <div class="actu-image">
            <img src="{{ asset('images/image1.jpg') }}" alt="Protocole d’accord CNRST-MURA">
          </div>
          <div class="actu-date">14 juin 2024</div>
          <p>Signature d’un protocole entre le CNRST et MURA pour appuyer le développement du gisement de fer de Megout.</p>
        </div>

        <!-- Actualité 3 -->
        <div class="actualite-card">
          
          <div class="actu-image">
            <img src="{{ asset('images/image1.jpg') }}" alt="Sensibilisation santé volontaire">
          </div>
          <div class="actu-date">14 juin 2024</div>
          <p>Le CNRST organise une session de sensibilisation sur l’assurance santé volontaire à destination des chercheurs et techniciens.</p>
        </div>

        <!-- Actualité 4 -->
        <div class="actualite-card">
          
          <div class="actu-image">
            <img src="{{ asset('images/image1.jpg') }}" alt="Rencontre CNRST-ROXGOLD SANU">
          </div>
          <div class="actu-date">13 mai 2024</div>
          <p>Rencontre entre le CNRST et ROXGOLD SANU pour discuter de la mise en place d’un système de couverture santé pour les employés du secteur minier.</p>
        </div>
      </div>

      <a href="#" class="btn-cnrs">Voir plus <i class="fas fa-arrow-right" style="margin-left: 8px;"></i></a>
    </section> -->

<!-- =========================
     NOS MISSIONS DU CNRST
     ========================= -->
<!-- <section class="missions-cnrs">
  <h2 class="missions-title">Nos missions</h2>

  <div class="missions-grid">
    <div class="mission-card">
      <i class="fas fa-bullhorn icon-mission" aria-hidden="true"></i>
      <h3>Commercialisation</h3>
      <p>Promouvoir et diffuser les résultats de la recherche scientifique au niveau national et international.</p>
    </div>

    <div class="mission-card">
      <i class="fas fa-flask icon-mission" aria-hidden="true"></i>
      <h3>Transformation</h3>
      <p>Valoriser les innovations technologiques issues des laboratoires et centres affiliés.</p>
    </div>

    <div class="mission-card">
      <i class="fas fa-seedling icon-mission" aria-hidden="true"></i>
      <h3>Exploitation</h3>
      <p>Mettre en œuvre des projets de recherche appliquée au service du développement durable.</p>
    </div>

    <div class="mission-card">
      <i class="fas fa-check-circle icon-mission" aria-hidden="true"></i>
      <h3>Affinage</h3>
      <p>Assurer la qualité, la traçabilité et la valorisation des données scientifiques produites.</p>
    </div>
  </div>
  <div class="missions-btn-container">
    <a href="#" class="btn-voir-plus">Voir plus <i class="fas fa-arrow-right" style="margin-left: 8px;"></i></a>
  </div>
</section> -->

<!-- pour la section directions -->
<!-- <section class="cnrst-directions">
    <h2>Nos directions</h2>
  <div class="cnrst-wrapper">
    <div class="cnrst-image">
      <img src="{{ asset('images/image2.jpg') }}" alt="Direction générale du CNRST">
    </div>

    <div class="cnrst-text">
        <p>La direction générale du CNRST est organisée autour :</p><br> <br>
      <ul class="cnrst-list">
        <li>Direction Générale (DG)</li>
        <li>Direction de la Recherche Scientifique (DRS)</li>
        <li>Direction de l’Innovation et du Transfert Technologique (DITT)</li>
        <li>Direction de la Valorisation des Résultats de la Recherche (DVRR)</li>
        <li>Direction des Programmes et Projets Scientifiques (DPPS)</li>
        <li>Direction des Ressources Humaines (DRH)</li>
        <li>Direction des Finances et de la Comptabilité (DFC)</li>
        <li>Direction de la Communication et des Relations Extérieures (DCRE)</li>
        <li>Direction des Archives et de la Documentation Scientifique (DADS)</li>
        <li>Direction de l’Informatique et des Systèmes d’Information (DISI)</li>
      </ul>
    </div>
    <a href="{{ route('about.directions') }}" class="btn-directions">
      Voir plus <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
    </a>

  </div>
</section>


</div> -->

@endsection 



