@push('styles')
<link rel="stylesheet" href="{{ asset('css/mon_espace/cv_form.css') }}">
<style>
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@php
    use Illuminate\Support\Facades\Storage;
    $cv = session('cv_data');
@endphp

@if (session('status'))
    <div class="alert alert-success d-flex justify-content-between align-items-center fade-in">
        <span>{{ session('status') }}</span>

        @if(isset($cv['cv_path']) && Storage::disk('public')->exists($cv['cv_path']))
            <a href="{{ route('cv.file.download') }}" class="btn btn-sm btn-outline-primary ms-3">
                📎 Télécharger le fichier CV
            </a>
        @endif
    </div>
@endif


<div class="container cv-form">
    {{-- ✅ Message de confirmation + bouton de téléchargement --}}
    @if (session('status'))
        <div class="alert alert-success d-flex justify-content-between align-items-center fade-in">
            <span>{{ session('status') }}</span>

            @if(isset($cv['cv_path']) && Storage::disk('public')->exists($cv['cv_path']))
                <a href="{{ route('cv.file.download') }}" class="btn btn-sm btn-outline-primary ms-3">
                    📎 Télécharger le fichier CV
                </a>
            @endif
        </div>
    @endif

    {{-- ❌ Alertes d’erreur --}}
    @if ($errors->any())
        <div class="alert alert-danger fade-in">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h3 class="mb-3">📝 Mon CV – Formulaire</h3>

    <!-- 🧾 Formulaire principal -->
    <form method="POST" action="{{ route('cv.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nom complet</label>
                <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required />
            </div>
            <div class="col-md-6">
                <label class="form-label">Titre professionnel</label>
                <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}" />
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required />
            </div>
            <div class="col-md-6">
                <label class="form-label">Téléphone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
            </div>

            <div class="col-md-6">
                <label class="form-label">Ville</label>
                <input type="text" name="city" class="form-control" value="{{ old('city') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">LinkedIn</label>
                <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/..." value="{{ old('linkedin') }}" />
            </div>
            <div class="col-md-6">
                <label class="form-label">GitHub / Portfolio</label>
                <input type="url" name="github" class="form-control" placeholder="https://github.com/..., https://monsite.com" value="{{ old('github') }}" />
            </div>
        </div>

        <div class="mt-4">
            <label class="form-label">Résumé / Profil</label>
            <textarea name="summary" class="form-control" rows="4" placeholder="Présentez-vous en quelques lignes...">{{ old('summary') }}</textarea>
        </div>

        <div class="mt-4">
            <label class="form-label">Compétences</label>
            <textarea name="skills" class="form-control" rows="3" placeholder="Ex: Laravel, PHP, MySQL, JavaScript, Git">{{ old('skills') }}</textarea>
        </div>

        <div class="mt-4">
            <label class="form-label">Expériences</label>
            <textarea name="experiences" class="form-control" rows="5" placeholder="Poste – Entreprise – Dates – Missions/Résultats">{{ old('experiences') }}</textarea>
        </div>

        <div class="mt-4">
            <label class="form-label">Formations</label>
            <textarea name="educations" class="form-control" rows="4" placeholder="Diplôme – Établissement – Dates">{{ old('educations') }}</textarea>
        </div>

        <div class="row mt-4 g-3">
            <div class="col-md-6">
                <label class="form-label">Langues</label>
                <textarea name="languages" class="form-control" rows="3" placeholder="Français (Courant), Anglais (Professionnel)">{{ old('languages') }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Centres d’intérêt</label>
                <textarea name="interests" class="form-control" rows="3" placeholder="Tech, IA, Lecture, Sport">{{ old('interests') }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <label class="form-label">Fichier CV (PDF ou DOC)</label>
            <input type="file" name="cv_file" class="form-control" accept=".pdf,.doc,.docx" required>
            @error('cv_file')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center mt-4">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-outline-success">Enregistrer</button>
                <button type="button" class="btn btn-outline-secondary" disabled>Envoyer par email (bientôt)</button>
            </div>
        </div>
    </form>
    @push('styles')
<style>
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

</div>
<script src="{{ asset('js/cv_form.js') }}"></script>