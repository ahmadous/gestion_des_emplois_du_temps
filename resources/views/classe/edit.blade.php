@extends('layouts.app')
@section('titre')
editer classe
@endsection
@section('content')
<div class="container">
    <div class="row g-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formulaire de modification - {{ $classe->nom }}</h4>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach

                    <form action="{{ route('classe.update', compact('classe')) }}" method="POST">
                        @method('put')classe
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" value="{{ old('nom') ?? $classe->nom }}" class="form-control"
                                        name="nom" id="nom" aria-describedby="helpNomId"
                                        placeholder="Nom de la tache">
                                    @error('nom')
                                        <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="number" value="{{ old('nombre') ?? $classe->nombre }}" class="form-control"
                                        name="nombre" id="nombre" aria-describedby="helpNombreId"
                                        placeholder="Nombre de la tache">
                                    @error('nombre')
                                        <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="filiere_id" class="form-label">Selection filiere</label>
                                    <select class="form-control" name="filiere_id">
                                        @foreach ($filieres as $filiere)
                                         <option selected value="{{$filiere->id}}">{{$filiere->nom}}</option>
                                        @endforeach
                                    </select>
                                    @error('filiere_id')
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
