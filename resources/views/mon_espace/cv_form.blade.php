
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1> Gestion de CV</h1>
    </div>
    {{-- ✅ Message de succès + lien de téléchargement --}}
    @if(session('status') && session('cv_data'))
    @php
        $cv = session('cv_data');
        $cvPath = isset($cv['cv_path']) ? public_path('storage/' . $cv['cv_path']) : null;
    @endphp

    <div class="success-message mt-4">
        <h3>✅ {{ session('status') }}</h3>
        <p>Votre CV a été uploadé et sauvegardé avec succès.</p>

        @if($cvPath && file_exists($cvPath))
            <a href="{{ asset('storage/' . $cv['cv_path']) }}" class="download-btn" download>
                 Télécharger le fichier CV
            </a>
        @else
            <p class="text-warning"> Le fichier semble introuvable dans le dossier <code>public/storage</code>.</p>
        @endif
    </div>
@endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cv.store') }}" enctype="multipart/form-data">
        @csrf

           <!-- Nouveau champ d’upload du fichier CV  -->
        <div class="mt-4">
            <label class="form-label">Fichier CV (PDF ou DOC)</label>
            <input type="file" name="cv_file" class="form-control" accept=".pdf,.doc,.docx" required>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="full_name">Nom complet <span class="required">*</span></label>
                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
            </div>
        </div>

        <div class="btn-group">
            <button type="reset" class="btn btn-secondary">Réinitialiser</button>
            <button type="submit" class="btn btn-primary">Enregistrer le CV</button>
        </div>
    </form>

</div>
<script>
document.getElementById('cv_file').addEventListener('change', function () {
    const fileName = this.files[0]?.name || '';
    document.getElementById('file-name').textContent = fileName
        ? ` Fichier sélectionné : ${fileName}`
        : '';
});
</script>



