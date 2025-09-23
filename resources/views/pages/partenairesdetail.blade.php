@extends('layouts.app')

@section('content')
<!-- SECTION DÉTAIL PARTENARIAT -->
<section class="detail after-header" aria-labelledby="detail-title">
  <h1 id="detail-title" class="detail__title">Détail du partenariat</h1>

  <article class="detail__card" role="article">
    <p class="detail__meta muted">
      #<span id="num">—</span> · Domaine:
      <strong id="domaines">—</strong>
    </p>

    <div class="detail__block">
      <h2 class="detail__heading">Présentation</h2>

      <div class="detail__grid">
        <div><strong>État:</strong> <span id="etat">Signé</span></div>
        <div><strong>Institution partenaire:</strong> <span id="partenaire">—</span></div>
        <div><strong>Pays/Org. intergouvernemental:</strong> <span id="pays">—</span></div>
        <div><strong>Date d'entrée en vigueur:</strong> <span id="debut">—</span></div>
        <div><strong>Date d'expiration:</strong> <span id="fin">—</span></div>
        <div><strong>Durée du partenariat:</strong> <span id="duree">—</span></div>
        <div><strong>Modalité renouvellement:</strong> <span id="renouvellement">—</span></div>
        <div><strong>Type convention/accord:</strong> <span id="type">—</span></div>
        <div><strong>Type partenaire:</strong> <span id="typePart">—</span></div>
        <div><strong>Périodicité d'évaluation:</strong> <span id="period">—</span></div>
      </div>
    </div>

    <div class="detail__block">
      <h2 class="detail__heading">Signataires de la convention</h2>
      <div id="signataires" class="muted">Aucun signataire pour le moment</div>
    </div>

    <div class="detail__block">
      <h2 class="detail__heading">Porteurs / points focaux</h2>
      <div class="detail__grid" id="porteurs"></div>
    </div>

    <div class="detail__actions">
      <button type="button" class="btn btn--secondary" id="btnBack">Retour</button>
    </div>
  </article>
</section>

<script>
  // Récupération de l'id depuis ?id=...
  const params = new URLSearchParams(location.search);
  const id = params.get('id');

  // Données d'exemple (remplace par ton API)
  const accords = {
    "1": {
      num: "2024-001",
      titre: "Accord cadre ... ABDELMALEK ESSAÂDI",
      domaines: ["Enseignement","Recherche","Mobilité","Expertise"],
      partenaire: "Université AbdelMalek ESSAÂDI",
      pays: "Maroc",
      etat: "Signé",
      debut: "24-07-2024",
      fin: "23-07-2029",
      duree: "60 mois",
      renouvellement: "Reconduction après évaluation",
      type: "Accords-cadres",
      typePart: "Académique: universités, centres ou instituts de recherches",
      period: "12 mois",
      signataires: [],
      porteurs: [{nom:"Pr Adama SANOU", tel:"70415717", email:"adama.sanou@ujkz.bf"}]
    }
  };

  const a = accords[id] || null;
  const setText = (i,v)=>{ const el=document.getElementById(i); if(el) el.textContent=v; };

  if(a){
    document.title = a.titre;
    setText('num', a.num);
    setText('domaines', a.domaines.join(', '));
    setText('etat', a.etat);
    setText('partenaire', a.partenaire);
    setText('pays', a.pays);
    setText('debut', a.debut);
    setText('fin', a.fin);
    setText('duree', a.duree);
    setText('renouvellement', a.renouvellement);
    setText('type', a.type);
    setText('typePart', a.typePart);
    setText('period', a.period);

    const sig = document.getElementById('signataires');
    if(a.signataires?.length){ sig.textContent = a.signataires.join(', '); }

    const porteurs = document.getElementById('porteurs');
    if(a.porteurs?.length){
      porteurs.innerHTML = a.porteurs.map(p => `
        <div><strong>Nom & prénom:</strong> ${p.nom}</div>
        <div><strong>Téléphone:</strong> ${p.tel}</div>
        <div><strong>Email:</strong> ${p.email}</div>
      `).join('');
    } else {
      porteurs.innerHTML = '<div class="muted">Aucun porteur renseigné</div>';
    }
  }

  // Bouton Retour
  document.getElementById('btnBack').addEventListener('click', () => {
    if (document.referrer && new URL(document.referrer).origin === location.origin) {
      history.back();
    } else {
      location.href = '/partenaires'; // mets l’URL de ta page d’accueil
    }
  });
</script>

@endsection
