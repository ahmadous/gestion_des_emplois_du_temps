@extends('layouts.app')

@section('title', 'Détails de la matiere: ' . $matiere->nom)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $matiere->nom }}</h4>
            <hr>
            <p class="card-text">SIGLE: {{ $matiere->sigle }}</p>
            <p class="card-text">DOMAINE: {{ $matiere->domaine }}</p>
            <p class="card-text">DUREE: {{ $matiere->duree }}</p>
        </div>
    </div>
@endsection
