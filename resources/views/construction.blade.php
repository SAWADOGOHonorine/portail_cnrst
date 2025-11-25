@extends('layouts.app')

@section('title', 'Page en construction')

@section('content')
<style>
.construction-container {
    min-height: 75vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 30px;
}

.construction-icon {
    font-size: 5rem;
    color: #28a745;
    animation: bounce 1.4s infinite;
}

@keyframes bounce {
    0% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0); }
}

.construction-title {
    font-size: 2.5rem;
    font-weight: bold;
    margin-top: 20px;
    color: #000;
}

.construction-subtitle {
    font-size: 1.2rem;
    margin-top: 10px;
    color: #555;
}

.construction-loader {
    margin-top: 30px;
    border: 6px solid #eee;
    border-top: 6px solid #28a745;
    border-radius: 50%;
    width: 55px;
    height: 55px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

</style>

<div class="construction-container">
    <i class="bi bi-tools construction-icon"></i>

    <div class="construction-title">
        🚧 Page en construction
    </div>

    <div class="construction-subtitle">
        Nous travaillons activement pour rendre cette section disponible très bientôt.
    </div>

    <div class="construction-loader"></div>
</div>
@endsection
