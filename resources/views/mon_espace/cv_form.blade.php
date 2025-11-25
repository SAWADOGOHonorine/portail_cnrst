<link rel="stylesheet" href="{{ asset('css/mon_espace/cv_form.css') }}"
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

    @if(isset($cv) && $cv)
        {{-- Affichage du CV existant --}}
        <div class="success-message mt-4">
            <h3>Vous avez déjà un CV enregistré</h3>
            <p><strong>Nom :</strong> {{ $cv->nom }} {{ $cv->prenom }}</p>
            <p><strong>Email :</strong> {{ $cv->email }}</p>
            <p><strong>Institut :</strong> {{ $cv->institut }}</p>
            <p><strong>Département :</strong> {{ $cv->departement }}</p>

            @if($cv->cv_path && file_exists(public_path('storage/' . $cv->cv_path)))
                <a href="{{ asset('storage/' . $cv->cv_path) }}" class="btn btn-success mt-2" target="_blank">
                    Voir le fichier CV
                </a>
                <a href="{{ asset('storage/' . $cv->cv_path) }}" class="btn btn-primary mt-2" download>
                    Télécharger le CV
                </a>
            @else
                <p class="text-warning mt-2">
                    Le fichier CV est introuvable.
                </p>
            @endif
        </div>
    @else
        {{-- Formulaire pour créer le CV --}}
        <form method="POST" action="{{ route('cv.store') }}" enctype="multipart/form-data" class="mt-4">
            @csrf

            {{-- Nom et prénom --}}
            <div class="row">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" class="form-control" required>
                </div>
            </div>

            {{-- Email, Téléphone, WhatsApp --}}
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="whatsapp" class="form-label">WhatsApp</label>
                    <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" class="form-control">
                </div>
            </div>

            {{-- Adresse et ville --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" id="ville" name="ville" value="{{ old('ville') }}" class="form-control">
                </div>
            </div>

            {{-- Date et lieu de naissance --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="lieu_naissance" class="form-label">Lieu de naissance</label>
                    <input type="text" id="lieu_naissance" name="lieu_naissance" value="{{ old('lieu_naissance') }}" class="form-control">
                </div>
            </div>

            {{-- Pays et Institut --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="pays" class="form-label">Pays <span class="text-danger">*</span></label>
                    <select id="pays" name="pays" class="form-control" required>
                        <option value="">Sélectionnez un pays</option>
                        <option value="Burkina Faso" {{ old('pays') == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                        <option value="Côte d’Ivoire" {{ old('pays') == "Côte d’Ivoire" ? 'selected' : '' }}>Côte d’Ivoire</option>
                        <option value="Mali" {{ old('pays') == 'Mali' ? 'selected' : '' }}>Mali</option>
                        <option value="Niger" {{ old('pays') == 'Niger' ? 'selected' : '' }}>Niger</option>
                        <option value="Sénégal" {{ old('pays') == 'Sénégal' ? 'selected' : '' }}>Sénégal</option>
                        <option value="Togo" {{ old('pays') == 'Togo' ? 'selected' : '' }}>Togo</option>
                        <option value="Ghana" {{ old('pays') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                        <option value="Bénin" {{ old('pays') == 'Bénin' ? 'selected' : '' }}>Bénin</option>
                        <option value="France" {{ old('pays') == 'France' ? 'selected' : '' }}>France</option>
                        <option value="USA" {{ old('pays') == 'USA' ? 'selected' : '' }}>USA</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="institut" class="form-label">Institut <span class="text-danger">*</span></label>
                    <select id="institut" name="institut" class="form-control" required>
                        <option value="">Sélectionnez un institut</option>
                        <option value="INERA" {{ old('institut') == 'INERA' ? 'selected' : '' }}>INERA</option>
                        <option value="IRSAT" {{ old('institut') == 'IRSAT' ? 'selected' : '' }}>IRSAT</option>
                        <option value="IRSS" {{ old('institut') == 'IRSS' ? 'selected' : '' }}>IRSS</option>
                        <option value="INSS" {{ old('institut') == 'INSS' ? 'selected' : '' }}>INSS</option>
                    </select>
                </div>
            </div>

            {{-- Département et Spécialité --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="departement" class="form-label">Département <span class="text-danger">*</span></label>
                    <select id="departement" name="departement" class="form-control" required>
                        <option value="">Sélectionnez un département</option>
                        <option value="Informatique" {{ old('departement') == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                        <option value="Mathématiques" {{ old('departement') == 'Mathématiques' ? 'selected' : '' }}>Mathématiques</option>
                        <option value="Physique" {{ old('departement') == 'Physique' ? 'selected' : '' }}>Physique</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="specialite" class="form-label">Spécialité <span class="text-danger"></span></label>
                    <select id="specialite" name="specialite" class="form-control" required>
                        <option value="">Sélectionnez une spécialité</option>
                        <option value="Specialite A" {{ old('specialite') == 'Specialite A' ? 'selected' : '' }}>Specialite A</option>
                        <option value="Specialite B" {{ old('specialite') == 'Specialite B' ? 'selected' : '' }}>Specialite B</option>
                        <option value="Specialite C" {{ old('specialite') == 'Specialite C' ? 'selected' : '' }}>Specialite C</option>
                    </select>
                </div>
            </div>

            {{-- Domaine et Mot clé --}}
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="domaine" class="form-label">Domaine <span class="text-danger"></span></label>
                    <select id="domaine" name="domaine" class="form-control" required>
                        <option value="">Sélectionnez un domaine</option>
                        <option value="Domaine X" {{ old('domaine') == 'Domaine X' ? 'selected' : '' }}>Domaine X</option>
                        <option value="Domaine Y" {{ old('domaine') == 'Domaine Y' ? 'selected' : '' }}>Domaine Y</option>
                        <option value="Domaine Z" {{ old('domaine') == 'Domaine Z' ? 'selected' : '' }}>Domaine Z</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="mot_cle" class="form-label">Mot clé</label>
                    <input type="text" id="mot_cle" name="mot_cle" value="{{ old('mot_cle') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Détaille Scientifique (20-25 caractères)</label>
                    <input type="text" name="detaille_scientifique" maxlength="25" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Projet de Recherche</label>
                    <textarea name="projet_recherche" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Genre</label>
                    <select name="genre" class="form-control">
                        <option value="">-- Sélectionner --</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Thématique de Recherche</label>
                    <input type="text" name="thematique_recherche" class="form-control">
                </div>

            </div>

            {{-- Fichier CV --}}
            <div class="mt-4">
                <label for="cv_file" class="form-label">Fichier CV (PDF ou DOC) <span class="text-danger">*</span></label>
                <input type="file" id="cv_file" name="cv_file" class="form-control" accept=".pdf,.doc,.docx" required>
                <span id="file-name" class="text-muted"></span>
            </div>

            <div class="btn-group mt-4">
                <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                <button type="submit" class="btn btn-primary">Enregistrer le CV</button>
            </div>
        </form>
    @endif
</div>

<script>
document.getElementById('cv_file')?.addEventListener('change', function () {
    const fileName = this.files[0]?.name || '';
    document.getElementById('file-name').textContent = fileName
        ? `Fichier sélectionné : ${fileName}`
        : '';
});
</script>



