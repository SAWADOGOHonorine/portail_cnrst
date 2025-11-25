<link rel="stylesheet" href="{{ asset('css/pages/banniere.css') }}">
<section class="stats-banner">
  <div class="stats-banner__inner">

    <!-- CHERCHEURS -->
    <a href="#" class="stats-banner__item">
      <i class="bi bi-people-fill"></i>
      <div class="stats-banner__value">{{ $nbEnseignants ?? 0 }}</div>
      <div class="stats-banner__label">CHERCHEURS</div>
    </a>

    <!-- PUBLICATIONS -->
    <a href="{{ route('publications.index') }}" class="stats-banner__item">
      <i class="bi bi-journal-bookmark-fill"></i>
      <div class="stats-banner__value">{{ $nbPublications ?? 0 }}</div>
      <div class="stats-banner__label">PUBLICATIONS</div>
    </a>

    <!-- LABORATOIRES -->
    <a href="{{ route('laboratoires.index') }}" class="stats-banner__item">
      <i class="bi bi-flask"></i>
      <div class="stats-banner__value">{{ $nbLaboratoires ?? 0 }}</div>
      <div class="stats-banner__label">LABORATOIRES</div>
    </a>

    <!-- PROJETS -->
    <a href="#" class="stats-banner__item">
      <i class="bi bi-globe2"></i>
      <div class="stats-banner__value">{{ $nbProjets ?? 0 }}</div>
      <div class="stats-banner__label">PROJETS</div>
    </a>

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.stats-banner__value').forEach(counter => {
    const target = parseInt(counter.textContent) || 0;
    counter.textContent = '0';
    const duration = 1200; // durée totale animation en ms
    const stepTime = Math.max(Math.floor(duration / target), 20); // temps minimum entre chaque incrément

    let current = 0;
    const updateCount = () => {
      current += 1;
      if(current <= target){
        counter.textContent = current;
        setTimeout(updateCount, stepTime);
      } else {
        counter.textContent = target;
      }
    };
    if(target > 0) updateCount();
  });
});
</script>


