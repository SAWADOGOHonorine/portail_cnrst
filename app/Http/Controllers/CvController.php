<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cv;
use Barryvdh\DomPDF\Facade\Pdf; 
use FPDF;
use App\Models\User;

class CvController extends Controller
{
    /**
     *  Affiche le formulaire de création du CV
     */
    public function create()
    {
        return view('mon_espace.cv_form');
    }

    /**
     * 💾 Enregistre le CV et redirige vers la page HTML d’affichage (cv_show)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'             => 'required|string|max:255',
            'prenom'          => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'telephone'       => 'nullable|string|max:50',
            'whatsapp'        => 'nullable|string|max:20',
            'adresse'         => 'nullable|string|max:255',
            'ville'           => 'nullable|string|max:255',
            'pays'            => 'nullable|string|max:255',
            'institut'        => 'nullable|string|max:255',
            'departement'     => 'nullable|string|max:255',
            'specialite'      => 'nullable|string|max:255',
            'domaine'         => 'nullable|string|max:255',
            'mot_cle'         => 'nullable|string|max:255',
            'date_naissance'  => 'nullable|date',
            'lieu_naissance'  => 'nullable|string|max:255',
            'detaille_scientifique' => 'nullable|string',
            'projet_recherche'      => 'nullable|string',
            'genre'                 => 'nullable|in:homme,femme,autre',
            'thematique_recherche'  => 'nullable|string',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Upload du fichier
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $validated['cv_path'] = $file->storeAs('cvs', $filename, 'public');
        }

        // Enregistrement ou mise à jour du CV
        $cv = Cv::updateOrCreate(
            ['user_id' => auth()->id()],
            $validated
        );

        return redirect()
            ->route('cv.show', $cv->id)
            ->with('status', 'CV sauvegardé avec succès !');
    }

    /**
     * 🧾 Affiche la page HTML du CV
     */
    public function show($id)
    {
        $cv = Cv::findOrFail($id);
        return view('mon_espace.cv_show', compact('cv'));
    }

    /**
     * 📂 Visionnage inline du fichier PDF/DOC uploadé
     */
    public function viewFile($id)
    {
        $cv = Cv::findOrFail($id);

        if (!$cv->cv_path || !Storage::disk('public')->exists($cv->cv_path)) {
            abort(404, "Fichier introuvable.");
        }

        $extension = pathinfo($cv->cv_path, PATHINFO_EXTENSION);
        $mimeTypes = [
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
        $mime = $mimeTypes[$extension] ?? 'application/octet-stream';

        return response()->file(storage_path('app/public/' . $cv->cv_path), [
            'Content-Type'        => $mime,
            'Content-Disposition' => 'inline; filename="' . basename($cv->cv_path) . '"'
        ]);
    }

    public function generatePdf($id)
    {
        $cv = Cv::findOrFail($id);

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Titre
        $pdf->Cell(0,10,'CV de '.$cv->nom.' '.$cv->prenom,0,1,'C');

        $pdf->Ln(5); // Saut de ligne

        // Informations personnelles
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(50,8,'Nom:',0,0);
        $pdf->Cell(0,8,$cv->nom,0,1);

        $pdf->Cell(50,8,'Prénom:',0,0);
        $pdf->Cell(0,8,$cv->prenom,0,1);

        $pdf->Cell(50,8,'Email:',0,0);
        $pdf->Cell(0,8,$cv->email,0,1);

        $pdf->Cell(50,8,'Téléphone:',0,0);
        $pdf->Cell(0,8,$cv->telephone ?? '-',0,1);

        $pdf->Cell(50,8,'WhatsApp:',0,0);
        $pdf->Cell(0,8,$cv->whatsapp ?? '-',0,1);

        $pdf->Cell(50,8,'Adresse:',0,0);
        $pdf->Cell(0,8,$cv->adresse ?? '-',0,1);

        $pdf->Cell(50,8,'Ville:',0,0);
        $pdf->Cell(0,8,$cv->ville ?? '-',0,1);

        $pdf->Cell(50,8,'Pays:',0,0);
        $pdf->Cell(0,8,$cv->pays ?? '-',0,1);

        $pdf->Cell(50,8,'Institut:',0,0);
        $pdf->Cell(0,8,$cv->institut ?? '-',0,1);

        $pdf->Cell(50,8,'Département:',0,0);
        $pdf->Cell(0,8,$cv->departement ?? '-',0,1);

        $pdf->Cell(50,8,'Spécialité:',0,0);
        $pdf->Cell(0,8,$cv->specialite ?? '-',0,1);

        $pdf->Cell(50,8,'Domaine:',0,0);
        $pdf->Cell(0,8,$cv->domaine ?? '-',0,1);

        $pdf->Cell(50,8,'Mot clé:',0,0);
        $pdf->Cell(0,8,$cv->mot_cle ?? '-',0,1);

        $pdf->Cell(50,8,'Date de naissance:',0,0);
        $pdf->Cell(0,8,$cv->date_naissance ?? '-',0,1);

        $pdf->Cell(50,8,'Lieu de naissance:',0,0);
        $pdf->Cell(0,8,$cv->lieu_naissance ?? '-',0,1);

        $pdf->Cell(50,8,'Détail scientifique:',0,0);
        $pdf->MultiCell(0,8,$cv->detaille_scientifique ?? '-');

        $pdf->Cell(50,8,'Projet de recherche:',0,0);
        $pdf->MultiCell(0,8,$cv->projet_recherche ?? '-');

        $pdf->Cell(50,8,'Genre:',0,0);
        $pdf->Cell(0,8,$cv->genre ?? '-',0,1);

        $pdf->Cell(50,8,'Thématique de recherche:',0,0);
        $pdf->MultiCell(0,8,$cv->thematique_recherche ?? '-');

        $pdf->Output('I','CV_'.$cv->nom.'_'.$cv->prenom.'.pdf');
        exit;
    }

    /**
     * 📌 Page "Mon CV" dans le dashboard
     */
    public function monCv()
    {
        $cv = Cv::where('user_id', auth()->id())->first();
        return $cv ? view('mon_espace.cv_show', compact('cv')) : view('mon_espace.cv_form');
    }

    public function downloadPdf($id)
    {
        $cv = Cv::findOrFail($id);

        $pdf = Pdf::loadView('mon_espace.cv_pdf', compact('cv'));

        return $pdf->download("CV_{$cv->nom}_{$cv->prenom}.pdf");
    }

    public function showPdf($id)
    {
        $cv = Cv::findOrFail($id);

        $pdf = Pdf::loadView('mon_espace.cv_pdf', compact('cv'));

        return $pdf->stream("CV_{$cv->nom}_{$cv->prenom}.pdf");
    }

    public function showAdmin($id)
    {
        $user = User::findOrFail($id);
        $cv = Cv::where('user_id', $id)->first();

        return view('admin.cv_show', compact('user', 'cv'));
    }

    /**
     * Formulaire d'édition du CV (pré-rempli)
     */
    public function edit($id)
    {
        $cv = Cv::findOrFail($id);

        return view('mon_espace.cv_form', compact('cv'));
    }

    /**
     * Mise à jour du CV
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom'             => 'required|string|max:255',
            'prenom'          => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'telephone'       => 'nullable|string|max:50',
            'whatsapp'        => 'nullable|string|max:20',
            'adresse'         => 'nullable|string|max:255',
            'ville'           => 'nullable|string|max:255',
            'pays'            => 'nullable|string|max:255',
            'institut'        => 'nullable|string|max:255',
            'departement'     => 'nullable|string|max:255',
            'specialite'      => 'nullable|string|max:255',
            'domaine'         => 'nullable|string|max:255',
            'mot_cle'         => 'nullable|string|max:255',
            'date_naissance'  => 'nullable|date',
            'lieu_naissance'  => 'nullable|string|max:255',
            'detaille_scientifique' => 'nullable|string',
            'projet_recherche'      => 'nullable|string',
            'genre'                 => 'nullable|in:homme,femme,autre',
            'thematique_recherche'  => 'nullable|string',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cv = Cv::findOrFail($id);

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $validated['cv_path'] = $file->storeAs('cvs', $filename, 'public');
        }

        $cv->update($validated);

        return redirect()->route('cv.show', $cv->id)
                         ->with('status', 'CV mis à jour avec succès !');
    }
}







