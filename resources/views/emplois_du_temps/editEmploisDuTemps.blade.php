@extends('layouts.app')

@section('title', 'Page de modification de la emplois_du_temps ' . $emplois_du_temps->nom)

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification - {{ $emplois_du_temps->nom }}</h4>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach

                        <form action="{{ route('emplois_du_temps.update', compact('emplois_du_temps')) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">NOM</label>
                                        <input type="text" value="{{ old('nom') ?? $emplois_du_temps->nom }}" class="form-control"
                                            name="nom" id="nom" aria-describedby="helpNomId"
                                            placeholder="Nom de la emplois_du_temps">
                                        @error('nom')
                                            <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-secondary">Vider</button>
                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
