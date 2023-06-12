@extends('layouts.app')

@section('title', 'Détails de la classe : ' . $classe->nom)

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $classe->nom }}</h4>
            <hr>
            <p class="card-text">NOMBRE : {{ $classe->nombre }}</p>
            @foreach ($filiere as $filiere)
                @if ($classe->filiere_id==$filiere->id)
                    <p class="card-text">FILLIERE : {{ $filiere->nom }}</p>
                @endif
            @endforeach
            {{-- <p class="card-text">DATE DE CREATION: {{ $classe->date }}</p> --}}
        </div>
    </div>
    <a href="{{ route('emplois_du_temps.show', $classe->id, compact('classe')) }}"
        class="btn btn-danger mt-3">voir l'emploi du temps</a>
@endsection
