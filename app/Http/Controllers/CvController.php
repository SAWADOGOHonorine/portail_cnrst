<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
   
    //  Affiche le formulaire CV
    
    public function create(Request $request)
    {
        if (!$request->session()->has('status')) {
            $request->session()->forget('cv_data');
        }

        return view('mon_espace.cv_form');
    }
    
    //   Enregistre les données du CV + le fichier uploadé
     
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

        // Stockage du fichier CV
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = 'cv_' . auth()->id() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('cvs', $filename, 'public');
            $validated['cv_path'] = $path;
        }

        unset($validated['cv_file']); 

        // Enregistrement en session
        $request->session()->put('cv_data', $validated);

        //  Retour sur la même page avec message
        return redirect()->route('cv.create')->with('status', 'CV enregistré avec succès.');

    }

   
    //   Télécharge le fichier original uploadé
     
    public function downloadUploadedFile(Request $request)
    {
        $cvData = $request->session()->get('cv_data');

        if (!$cvData || !isset($cvData['cv_path'])) {
            return back()->withErrors(['cv' => "Fichier CV introuvable."]);
        }

        return Storage::disk('public')->download($cvData['cv_path']);
    }
}


