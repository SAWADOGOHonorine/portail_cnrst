@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
@endpush

@section('content')

<section class="search-section">
    <div class="container">
        <h2 class="search-title">TROUVEZ CE QUE VOUS CHERCHEZ</h2>

        <form method="GET" action="#" class="search-form d-flex justify-content-center">
            <div class="search-wrapper">
                <input type="text" name="query" class="search-input" placeholder="Enseignant, Publication, Laboratoire ..." required>
                <button type="submit" class="search-button">Rechercher</button>
            </div>
        </form>
    </div>
</section>



<!-- section caroucel -->
<section class="carousel-profil">
  <div class="slide active">
    <div class="profil-slide">
      <div class="profil-image">
        <img src="{{ asset('images/image1.jpg') }}" alt="Dr Ali Tacoré">
      </div>
      <div class="profil-infos">
        <h2>Dr Ali Tacoré</h2>
        <p>Discipline : Mathématiques</p>
        <p>Spécialité : Modélisation des systèmes</p>
        <p>📧 ali.tacore@ujkz.bf</p>
        <div class="indicateurs">
          <span>📚 14 Publications</span>
          <span>🎓 29 Encadrements</span>
        </div>
      </div>
    </div>
  </div>

  <div class="slide">
    <div class="profil-slide">
      <div class="profil-image">
        <img src="lamoussahan.jpg" alt="Dr Lamoussahan Kohoun">
      </div>
      <div class="profil-infos">
        <h2>Dr Lamoussahan Kohoun</h2>
        <p>Discipline : Langues et littératures</p>
        <p>Spécialité : Linguistique descriptive et technologie</p>
        <p>📧 lamoussahan.kohoun@ujkz.bf</p>
        <div class="indicateurs">
          <span>📚 0 Publications</span>
          <span>🎓 0 Encadrements</span>
        </div>
      </div>
    </div>
  </div>

  <div class="carousel-nav">
    <button class="prev">‹</button>
    <button class="next">›</button>
  </div>
</section>


<!-- la section publication et thematiques de recherche -->
<!-- Section Publications et Thématiques -->
<section class="main-container">
  <!-- Colonne gauche : Publications -->
  <div class="publications-section">
    <h2>PUBLICATIONS RÉCENTES</h2>

    <!-- Publication 1 -->
    <div class="publication-card">
      <span class="pub-type">COMMUNICATION</span>
      <h3 class="pub-title">
        <a href="publication1.html">
          Are freshwater stoneflies (Plecoptera) endangered in the West African Sahel region?
        </a>
      </h3>
      <p class="pub-authors">IDRISSA KABORE, ADAMA OUEDA, OTTO MOOG, ANDREAS MELCHER</p>
      <p class="pub-desc">
        Stoneflies are valuable indicators of ecological health and play a crucial role in maintaining
        the biodiversity of West Africa, but the research on Stoneflies species are still very insipid...
      </p>
      <div class="pub-footer">
        <span>📅 2025</span>
        <span class="pub-source">Topentag 2025</span>
      </div>
    </div>

    <!-- Publication 2 -->
    <div class="publication-card">
      <span class="pub-type">ARTICLE</span>
      <h3 class="pub-title">
        <a href="publication2.html">
          Physiological Responses and Productivity Assessment of Sorghum-Leguminous Association Cropping Systems
        </a>
      </h3>
      <p class="pub-authors">Sawadogo T, Bazié H. R, Bazié P, Sanon Z, Zombré G.</p>
      <p class="pub-desc">
        Optimizing farming systems is essential to boost productivity in Sudano-Sahelian zones,
        particularly in the face of challenges posed by climate change and soil degradation...
      </p>
      <div class="pub-footer">
        <span>📅 2025</span>
        <span class="pub-source">Current Agriculture Research Journal</span>
      </div>
    </div>

    <!-- Publication 3 -->
    <div class="publication-card">
      <span class="pub-type">ARTICLE</span>
      <h3 class="pub-title">
        <a href="publication3.html">
          Health centers network analysis with Gephi and ForceAtlas2 approach: Case of Burkina Faso
        </a>
      </h3>
      <p class="pub-authors">Saan-nanon Olivier Dabire, Désiré Guel, Boureima Zerbo</p>
      <p class="pub-desc">
        Burkina Faso, like many developing countries, faces significant challenges in public health,
        particularly regarding healthcare access and infrastructure distribution...
      </p>
      <div class="pub-footer">
        <span>📅 2025</span>
        <span class="pub-source">Scientific African</span>
      </div>
    </div>
  </div>

  <!-- Colonne droite : Thématiques -->
  <aside class="thematique-section">
    <h2>THÉMATIQUES</h2>
    <ul class="thematique-list">
      <li>Mathématiques (383)</li>
      <li>Informatique et sciences de l'information (187)</li>
      <li>Sciences physiques (474)</li>
      <li>Sciences de la Terre (169)</li>
      <li>Sciences sanitaires (367)</li>
      <li>Sciences biologiques (1698)</li>
      <li>Génie civil (35)</li>
      <li>Génie électrique, électroniques (6)</li>
      <li>Médecine fondamentale (129)</li>
      <li>Médecine clinique (1390)</li>
      <li>Agriculture, sylviculture et pêche (144)</li>
      <li>Sciences vétérinaires (6)</li>
      <li>Psychologie (63)</li>
      <li>Économie (83)</li>
      <li>Sciences de l’éducation (53)</li>
      <li>Sociologie (262)</li>
      <li>Sciences politiques (4)</li>
      <li>Droit & Sciences politiques (5)</li>
      <li>Géographie (271)</li>
      <li>Médias et Communication (63)</li>
      <li>Histoire & Archéologie (235)</li>
      <li>Langues et littératures (534)</li>
      <li>Arts (41)</li>
      <li>Autres (176)</li>
      <li>Entomologie (82)</li>
    </ul>
  </aside>
</section>
<script src="{{ asset('js/home.js') }}"></script>
@endsection
































