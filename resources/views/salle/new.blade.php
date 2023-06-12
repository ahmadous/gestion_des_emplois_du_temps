@extends('layouts.app')
@section('titre')
creer salle
@endsection
@section('content')
<div class="container">
    <div class="row g-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formulaire d'ajout d'un salle</h4>
                    <form action="{{ route('salle.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom"
                                        aria-describedby="helpNomId" placeholder="Nom du salle">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="number" class="form-control" name="nombre" id="nombre"
                                        aria-describedby="helpNomId" placeholder="Nombre de place">
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
