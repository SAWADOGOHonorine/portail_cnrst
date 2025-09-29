<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cv;

class CvController extends Controller
{
    /**
     * Affiche le formulaire CV
     */
    public function create()
    {
        $cvs = Cv::where('user_id', auth()->id())->latest()->get();
        return view('mon_espace.cv_form', compact('cvs'));
    }
    /**
 * Affiche le fichier CV dans le navigateur (sans layout)
 */
    public function show($id)
    {
        $cv = Cv::findOrFail($id);
        $path = storage_path('app/public/' . $cv->cv_path);

        if (file_exists($path)) {
            return response()->file($path); 
        }

        return back()->with('error', 'Fichier introuvable.');
    }


    /**
     * Enregistre les données du CV en session + base + fichier
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'    => ['required', 'string', 'max:255'],
            'job_title'    => ['nullable', 'string', 'max:255'],
            'email'        => ['required', 'email', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:50'],
            'city'         => ['nullable', 'string', 'max:100'],
            'linkedin'     => ['nullable', 'url', 'max:255'],
            'github'       => ['nullable', 'url', 'max:255'],
            'summary'      => ['nullable', 'string', 'max:2000'],
            'skills'       => ['nullable', 'string', 'max:2000'],
            'experiences'  => ['nullable', 'string', 'max:4000'],
            'educations'   => ['nullable', 'string', 'max:2000'],
            'languages'    => ['nullable', 'string', 'max:1000'],
            'interests'    => ['nullable', 'string', 'max:1000'],
            'cv_file'      => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);

        // 📁 Stockage du fichier avec nom unique
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('cvs', $filename, 'public');
            $validated['cv_path'] = 'cvs/' . $filename;

            unset($validated['cv_file']);
        }

        // 💾 Enregistrement en base
        Cv::create([
            'user_id' => auth()->id(),
            'cv_path' => $validated['cv_path'],
        ]);

        // 💾 Enregistrement en session
        $request->session()->put('cv_data', $validated);

        return redirect()->route('cv_form')->with('status', 'CV enregistré avec succès.');
    }

    /**
     * Génère le PDF du CV actif
     */
    public function downloadPdf(Request $request)
    {
        $cvData = $request->session()->get('cv_data');

        if (!$cvData) {
            return back()->withErrors(['cv' => "Veuillez d'abord remplir et enregistrer votre CV."]);
        }

        $pdf = Pdf::loadView('mon_espace.cv_pdf', ['cv' => $cvData]);
        $fileName = 'CV_' . preg_replace('/[^A-Za-z0-9_-]+/', '_', $cvData['full_name']) . '.pdf';

        return $pdf->download($fileName);
    }
}







