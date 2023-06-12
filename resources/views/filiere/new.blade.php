@extends('layouts.app')
@section('titre')
creer filiere
@endsection
@section('content')
<div class="container">
    <div class="row g-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formulaire d'ajout d'un filiere</h4>
                    <form action="{{ route('filiere.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom"
                                        aria-describedby="helpNomId" placeholder="Nom du filiere">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="departement_id" class="form-label">Selection departement</label>
                                    <select class="form-control" name="departement_id">
                                        @foreach ($departements as $departement)
                                         <option selected value="{{$departement->id}}">{{$departement->nom}}</option>
                                        @endforeach
                                    </select>
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
