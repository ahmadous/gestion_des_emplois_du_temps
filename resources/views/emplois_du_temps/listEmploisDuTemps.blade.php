@extends('layouts.app')

@section('title', 'liste des emplois_du_temps')

@section('content')
    <div class="container">
        <div card>
            <div card-body>
                @foreach ($classes as $classe)
                    {{-- {{ $emplois_du_temps->nom }} --}}
                    <a href="{{ route('emplois_du_temps.show', $classe->id, compact('classe')) }}" class="btn btn-danger">{{ $classe->nom }}</a>
                @endforeach
                <hr>
                {{-- @if(Gate::allows('access-admin'))
                    @if (auth()->user()->role=="admin")
                    <a href="{{ route('emplois_du_temps.create') }}" class="btn btn-primary">Nouvelle emplois_du_temps</a>
                    @endif
                @endif --}}
            </div>
        </div>
    </div>
@endsection
