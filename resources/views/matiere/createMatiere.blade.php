@extends('layouts.app')

@section('title', 'creation de matiere')

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire d'ajout d'une matiere</h4>
                        <form action="{{ route('matiere.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">NOM</label>
                                        <input type="text" class="form-control" name="nom" id="nom"
                                            aria-describedby="helpNomId" placeholder="Nom de la matiere" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="sigle" class="form-label">SIGLE</label>
                                        <input type="text" class="form-control" name="sigle" id="sigle"
                                            aria-describedby="helpNomId" placeholder="sigle de la matiere" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="domaine" class="form-label">DOMAINE</label>
                                        <input type="text" class="form-control" name="domaine" id="domaine"
                                            aria-describedby="helpNomId" placeholder="domaine de la matiere" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="duree" class="form-label">DUREE</label>
                                        <input type="number" class="form-control" name="duree" id="duree"
                                            aria-describedby="helpNomId" placeholder="duree de la matiere" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-secondary">Vider</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
