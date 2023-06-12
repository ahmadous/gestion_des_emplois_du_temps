@extends('layouts.app')

@section('title', 'Page de modification de la matiere ' . $matiere->nom)

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification - {{ $matiere->nom }}</h4>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach

                        <form action="{{ route('matiere.update', compact('matiere')) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">NOM</label>
                                        <input type="text" value="{{ old('nom') ?? $matiere->nom }}" class="form-control"
                                            name="nom" id="nom" aria-describedby="helpNomId"
                                            placeholder="Nom de la matiere">
                                        @error('nom')
                                            <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="sigle" class="form-label">SIGLE</label>
                                        <input type="text" value="{{ old('sigle') ?? $matiere->sigle }}" class="form-control"
                                            name="sigle" id="sigle" aria-describedby="helpNomId"
                                            placeholder="sigle de la matiere">
                                        @error('sigle')
                                            <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="domaine" class="form-label">DOMAINE</label>
                                        <input type="text" value="{{ old('domaine') ?? $matiere->domaine }}" class="form-control"
                                            name="domaine" id="domaine" aria-describedby="helpNomId"
                                            placeholder="domaine de la matiere">
                                        @error('domaine')
                                            <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="duree" class="form-label">DUREE</label>
                                        <input type="number" value="{{ old('duree') ?? $matiere->duree }}" class="form-control"
                                            name="duree" id="duree" aria-describedby="helpNomId"
                                            placeholder="duree de la matiere">
                                        @error('duree')
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
