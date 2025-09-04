<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    // public function about() {
    //     return view('pages.about');
    // }

    public function contact() {
        return view('pages.contact');
    }
    public function send(Request $request) {
    // Traitement du formulaire (validation, envoi email, etc.)
    return back()->with('success', 'Votre message a été envoyé avec succès.');
}

    public function partenariat() {
        return view('pages.about.partenariat');
    }

    public function recherche() {
        return view('pages.programmes.recherche');
    }

    public function innovation() {
        return view('pages.programmes.innovation');
    }

    public function partenariats() {
        return view('pages.programmes.partenariats');
    }

    public function nationale() {
        return view('pages.actualités.nationale');
    }

    public function internationale() {
        return view('pages.actualités.internationale');
    }

    public function inscription() {
        return view('pages.faq.inscription');
    }

    public function financement() {
        return view('pages.faq.financement');
    }

    public function photos() {
        return view('pages.medias.photos');
    }

    public function videos() {
        return view('pages.medias.videos');
    }
}

