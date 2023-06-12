@extends('layouts.app')

@section('title', 'Page de modification de la type_intervention ' . $type_intervention->nom)

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification - {{ $type_intervention->nom }}</h4>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach

                        <form action="{{ route('type_intervention.update', compact('type_intervention')) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">NOM</label>
                                        <input type="text" value="{{ old('nom') ?? $type_intervention->nom }}" class="form-control"
                                            name="nom" id="nom" aria-describedby="helpNomId"
                                            placeholder="Nom de la type_intervention">
                                        @error('nom')
                                            <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="duree" class="form-label">DUREE</label>
                                        <input type="int" value="{{ old('duree') ?? $type_intervention->duree }}" class="form-control"
                                            name="duree" id="duree" aria-describedby="helpNomId"
                                            placeholder="duree de la type_intervention">
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
