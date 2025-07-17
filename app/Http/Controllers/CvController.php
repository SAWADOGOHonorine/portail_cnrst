<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Cv;
use App\Mail\CvValidatedMail;


class CvController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|max:2048',
            'diplomes' => 'nullable|string',
            'domaines_competence' => 'nullable|string',
            'experience' => 'nullable|string',
            'langues' => 'nullable|string',
            'autres_infos' => 'nullable|string',
            'site_web' => 'nullable|url',
        ]);

        $cvData = $request->all();
        $cvData['user_id'] = Auth::id();

        if ($request->hasFile('photo')) {
            $cvData['photo'] = $request->file('photo')->store('cv_photos', 'public');
        }

        // Création du CV
        Cv::create($cvData);

        // Envoi de l'email à l'utilisateur
        Mail::to(Auth::user()->email)->send(new CvValidatedMail(Auth::user()));

        return redirect()->route('dashboard')->with('success', 'CV soumis avec succès.');
    }

        public function create()
    {
        return view('cv.create'); // Crée cette vue pour afficher le formulaire
    }

}

