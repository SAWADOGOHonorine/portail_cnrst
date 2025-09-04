 @extends('layouts.app')

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
        <img src="{{ asset('images/imsection1.jpg') }}" alt="CNRST Burkina Faso">
      </div>
    </section>

    <!-- deuxieme section messsage de bienvenue -->
    <section class="sonasp-bienvenue">
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
    </section>

<!-- =========================
     NOS MISSIONS DU CNRST
     ========================= -->
<section class="missions-cnrs">
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
</section>


</div>

@endsection 



