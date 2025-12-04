

 <link rel="stylesheet" href="{{ asset('css/mon_espace/cv_form.css') }}"> 
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Formulaire du CV</h1>
    </div>

    {{-- Messages d'erreur --}}
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire Création ou Édition --}}
    <form method="POST"
          action="{{ isset($cv) ? route('cv.update', $cv->id) : route('cv.store') }}"
          enctype="multipart/form-data"
          class="mt-4">
        @csrf
        @if(isset($cv))
            @method('PUT')
        @endif

        {{-- Nom et Prénom --}}
        <div class="row">
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $cv->nom ?? '') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $cv->prenom ?? '') }}" class="form-control" required>
            </div>
        </div>

        {{-- Email, Téléphone, WhatsApp --}}
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email', $cv->email ?? '') }}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="{{ old('telephone', $cv->telephone ?? '') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $cv->whatsapp ?? '') }}" class="form-control">
            </div>
        </div>

        {{-- Adresse et Ville --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $cv->adresse ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" id="ville" name="ville" value="{{ old('ville', $cv->ville ?? '') }}" class="form-control">
            </div>
        </div>

        {{-- Date et Lieu de Naissance --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $cv->date_naissance ?? '') }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="lieu_naissance" class="form-label">Lieu de naissance</label>
                <input type="text" id="lieu_naissance" name="lieu_naissance" value="{{ old('lieu_naissance', $cv->lieu_naissance ?? '') }}" class="form-control">
            </div>
        </div>

        {{-- Pays et Institut --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="pays" class="form-label">Pays</label>
                <select id="pays" name="pays" class="form-control">
                    <option value="">Sélectionnez un pays</option>
                    @foreach(['Burkina Faso','Côte d’Ivoire','Mali','Niger','Sénégal','Togo','Ghana','Bénin','France','USA'] as $p)
                        <option value="{{ $p }}" {{ old('pays', $cv->pays ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="institut" class="form-label">Institut</label>
                <select id="institut" name="institut" class="form-control">
                    <option value="">Sélectionnez un institut</option>
                    @foreach(['INERA','IRSAT','IRSS','INSS'] as $inst)
                        <option value="{{ $inst }}" {{ old('institut', $cv->institut ?? '') == $inst ? 'selected' : '' }}>{{ $inst }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Département et Spécialité --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="departement" class="form-label">Département</label>
                <select id="departement" name="departement" class="form-control">
                    <option value="">Sélectionnez un département</option>
                    @foreach(['Informatique','Mathématiques','Physique'] as $dep)
                        <option value="{{ $dep }}" {{ old('departement', $cv->departement ?? '') == $dep ? 'selected' : '' }}>{{ $dep }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="specialite" class="form-label">Spécialité</label>
                <select id="specialite" name="specialite" class="form-control">
                    <option value="">Sélectionnez une spécialité</option>
                    @foreach(['Specialite A','Specialite B','Specialite C'] as $sp)
                        <option value="{{ $sp }}" {{ old('specialite', $cv->specialite ?? '') == $sp ? 'selected' : '' }}>{{ $sp }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Domaine et Mot clé --}}
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="domaine" class="form-label">Domaine</label>
                <select id="domaine" name="domaine" class="form-control">
                    <option value="">Sélectionnez un domaine</option>
                    @foreach(['Domaine X','Domaine Y','Domaine Z'] as $dom)
                        <option value="{{ $dom }}" {{ old('domaine', $cv->domaine ?? '') == $dom ? 'selected' : '' }}>{{ $dom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="mot_cle" class="form-label">Mot clé</label>
                <input type="text" id="mot_cle" name="mot_cle" value="{{ old('mot_cle', $cv->mot_cle ?? '') }}" class="form-control">
            </div>
        </div>

        {{-- Détaille Scientifique --}}
        <!-- <div class="mb-3 mt-3">
            <label>Détaille Scientifique </label>
            <input type="text" name="detaille_scientifique" maxlength="25" class="form-control"
                   value="{{ old('detaille_scientifique', $cv->detaille_scientifique ?? '') }}">
        </div> -->
        <div class="mb-3">
            <label>Détaille Scientifique</label>
            <textarea name="detaille_scientifique" class="form-control">{{ old('detaille_scientifique', $cv->detaille_scientifique ?? '') }}</textarea>
        </div>

        {{-- Projet de Recherche --}}
        <div class="mb-3">
            <label>Projet de Recherche</label>
            <textarea name="projet_recherche" class="form-control">{{ old('projet_recherche', $cv->projet_recherche ?? '') }}</textarea>
        </div>

        {{-- Genre --}}
        <div class="mb-3">
            <label>Genre</label>
            <select name="genre" class="form-control">
                <option value="">-- Sélectionner --</option>
                @foreach(['homme','femme'] as $g)
                    <option value="{{ $g }}" {{ old('genre', $cv->genre ?? '') == $g ? 'selected' : '' }}>{{ ucfirst($g) }}</option>
                @endforeach
            </select>
        </div>

        {{-- Thématique de Recherche --}}
        <div class="mb-3">
            <label>Thématique de Recherche</label>
            <textarea name="thematique_recherche" class="form-control">{{ old('thematique_recherche', $cv->thematique_recherche ?? '') }}</textarea>
        </div>

        {{-- Fichier CV --}}
        <div class="mt-4">
            <label for="cv_file" class="form-label">Fichier CV (PDF ou DOC)</label>
            <input type="file" id="cv_file" name="cv_file" class="form-control" accept=".pdf,.doc,.docx">
            <span id="file-name" class="text-muted">
                @if(isset($cv) && $cv->cv_path) Fichier actuel : {{ $cv->cv_path }} @endif
            </span>
        </div><br><br>

        {{-- Boutons --}}
        <div class="btn-group mt-4">
            <button type="reset" class="btn btn-secondary">Réinitialiser</button>
            <button type="submit" class="btn btn-primary">
                {{ isset($cv) ? 'Modifier le CV' : 'Enregistrer le CV' }}
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('cv_file')?.addEventListener('change', function () {
    const fileName = this.files[0]?.name || '';
    document.getElementById('file-name').textContent = fileName
        ? `Fichier sélectionné : ${fileName}`
        : '';
});
</script>
