document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('cvForm');
    const feedback = document.getElementById('cvFeedback');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        feedback.innerHTML = '';

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                feedback.innerHTML = `
                    <div class="alert alert-success">
                        ✅ ${data.message}<br>
                        <a href="${data.url}" target="_blank" class="btn btn-sm btn-outline-success mt-2">
                            📎 Télécharger le fichier CV
                        </a>
                    </div>
                `;
                form.reset();
            } else {
                feedback.innerHTML = `<div class="alert alert-warning">⚠️ Réponse inattendue.</div>`;
            }
        })
        .catch(() => {
            feedback.innerHTML = `<div class="alert alert-danger">❌ Une erreur est survenue.</div>`;
        });
    });
});
