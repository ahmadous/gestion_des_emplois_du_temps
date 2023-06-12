@extends('layouts.app')
@section('titre')
editer salle
@endsection
@section('content')
<div class="container">
    <div class="row g-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formulaire de modification - {{ $salle->nom }}</h4>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach

                    <form action="{{ route('salle.update', compact('salle')) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" value="{{ old('nom') ?? $salle->nom }}" class="form-control"
                                        name="nom" id="nom" aria-describedby="helpNomId"
                                        placeholder="Nom de la tache">
                                    @error('nom')
                                        <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="number" value="{{ old('nombre') ?? $salle->nombre }}" class="form-control"
                                        name="nombre" id="nom" aria-describedby="helpNomId"
                                        placeholder="Nombre de place">
                                    @error('nombre')
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
