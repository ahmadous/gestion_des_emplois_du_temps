@extends('layouts.app')

@section('title', 'Détails du type d\'intervention: ' . $type_intervention->nom)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $type_intervention->nom }}</h4>
            <hr>
            <p class="card-text">DUREE: {{ $type_intervention->duree }}</p>
        </div>
    </div>
@endsection
