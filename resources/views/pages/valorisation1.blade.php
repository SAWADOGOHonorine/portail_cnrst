
@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/valorisation1.css') }}">
@endpush

@section('content')
<section class="valorisations">
    <h4>21 valorisations trouvées</h4>

    <div class="valorisation-grid">

        <div class="valorisation-card">
            <p class="valorisation-date"><strong>Date :</strong> 03-06-2024</p>
            <p class="valorisation-porteur"><strong>Porteur :</strong> YAMEOGO Windyam Fidèle</p>
        </div>

        <div class="valorisation-card">
            <p class="valorisation-date"><strong>Date :</strong> 31-01-2024</p>
            <p class="valorisation-porteur"><strong>Porteur :</strong> SAWADOGO Benjamin</p>
        </div>

        <div class="valorisation-card">
            <p class="valorisation-date"><strong>Date :</strong> Non renseignée</p>
            <p class="valorisation-porteur"><strong>Porteur :</strong> YAMEOGO Relwende Aristide</p>
        </div>

        <div class="valorisation-card">
            <h5 class="valorisation-titre">Technologie</h5>
            <div class="valorisation-tags">
                <span class="tag tag-tech">Technologies</span>
            </div>
            <p class="valorisation-date"><strong>Date :</strong> 01-01-2023</p>
            <p class="valorisation-porteur"><strong>Porteur :</strong> KIENDREBEOGO Martin</p>
        </div>

        <div class="valorisation-card">
            <p class="valorisation-porteur"><strong>Porteur :</strong> COMPAORE Moussa</p>
        </div>

    </div>

    <div class="pagination">
        <a href="#" class="page-arrow">&laquo;</a>
        <a href="#" class="page-number">1</a>
        <a href="#" class="page-number active">2</a>
        <a href="#" class="page-arrow active">&raquo;</a>
    </div>
</section>

@endsection

