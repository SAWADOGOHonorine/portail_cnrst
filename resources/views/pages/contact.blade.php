@extends('layouts.app')

@section('title', 'Nous contacter')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/contact.css') }}">
@endpush

@section('contact')
<div class="contact-page">
    <!-- Bannière -->
    <section class="banner">
        <h1>Nous contacter</h1>
        <a href="{{ route('home') }}">Accueil</a> &gt; <span>Contact</span>
    </section>

    <!-- pour le formulaire de contact -->
    <section class="contact-form">
        <h2>Contactez-nous pour vos renseignements</h2>
        <p>Si vous avez des questions, veuillez utiliser les coordonnées suivantes.</p>

        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nom & Prénom</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit">ENVOYER</button>
        </form>
    </section>
    
    <!-- Coordonnées institutionnelles -->
    <section class="contact-details">
        <div class="detail-block">
            <h3><i class="fas fa-phone-alt"></i> Téléphone</h3>
            <p>+226 51 88 45 97</p>
            <p>+226 07 67 82 42</p>
        </div>

        <div class="detail-block">
            <h3><i class="fas fa-map-marker-alt"></i> Adresse</h3>
            <p>01 BP 14 Ouagadougou 01</p>
            <p>Avenue Thomas Sankara</p>
        </div>

        <div class="detail-block">
            <h3><i class="fas fa-envelope"></i> Email</h3>
            <p>cnrst@ymail.com</p>
            <p>info@cnrst.bf</p>
        </div>

        <div class="detail-block">
            <h3><i class="fas fa-clock"></i> Heures d'ouverture</h3>
            <p>Lun–Ven : 08:00 – 17:00</p>
        </div>
    </section>

        <!-- Carte de localisation -->
    <section class="map-section">
        <h3>📍 Localisation du CNRST</h3>

        <div class="map-wrapper">
            <iframe 
                src="https://www.google.com/maps?q=9FJW+H3X,+Avenue+du+Capitaine+Thomas+Sankara,+Ouagadougou,+Burkina+Faso&output=embed" 
                frameborder="0" 
                allowfullscreen 
                loading="lazy">
            </iframe>
        </div>

        <div class="map-button-wrapper">
            <a 
                href="https://www.google.com/maps?q=9FJW+H3X,+Avenue+du+Capitaine+Thomas+Sankara,+Ouagadougou,+Burkina+Faso" 
                target="_blank" 
                class="map-button">
                Voir sur Google Maps
            </a>
        </div>

    </section>

</div>
@endsection
