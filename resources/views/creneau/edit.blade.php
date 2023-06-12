@extends('layouts.app')
@section('titre')
    editer crenau
@endsection
@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($error != "")
                        <h6 class="alert alert-danger">{{$error}}</h6>
                       @endif
                        <h4 class="card-title">Formulaire de modification - {{ $creneau->nom }}</h4>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach

                        <form action="{{ route('creneau.update', compact('creneau')) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="classe_id" class="form-label">Selection classe</label>
                                        <select class="form-control" name="classe_id">
                                            @foreach ($classes as $classe)
                                                <option selected value="{{ $classe->id }}">{{ $classe->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="heure_debut" class="form-label">Heure Debut</label>
                                        <select class="form-control" name="heure_debut">
                                            <option selected value="08">08:00</option>
                                            <option selected value="09">09:00</option>
                                            <option selected value="10">10:00</option>
                                            <option selected value="15">15:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="heure_Fin" class="form-label">Heure Fin</label>
                                        <select class="form-control" name="heure_fin">
                                            <option selected value="10">10:00</option>
                                            <option selected value="12">12:00</option>
                                            <option selected value="16">16:00</option>
                                            <option selected value="18">18:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="jour" class="form-label">Selection jour</label>
                                        <select class="form-control" name="jour">
                                            <option selected value="Lundi">Lundi</option>
                                            <option selected value="Mardi">Mardi</option>
                                            <option selected value="Mercredi">Mercredi</option>
                                            <option selected value="Jeudi">Jeudi</option>
                                            <option selected value="Vendredi">Vendredi</option>
                                            <option selected value="Samedi">Samedi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="filiere_id" class="form-label">Selection professeur</label>
                                        <select class="form-control form-select" name="user_id">
                                            @foreach ($users as $user)
                                                @if ($user->role == 'professeur' || $user->role == 'admin')
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="matiere_id" class="form-label">Selection matiere</label>
                                        <select class="form-control" name="matiere_id">
                                            @foreach ($matieres as $matiere)
                                                <option selected value="{{ $matiere->id }}">{{ $matiere->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="salle_id" class="form-label">Selection Salle</label>
                                        <select class="form-control" name="salle_id">
                                            @foreach ($salles as $salle)
                                                <option selected value="{{ $salle->id }}">{{ $salle->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="type_intervention_id" class="form-label">Selection nature
                                            d'intervention</label>
                                        <select class="form-control" name="type_intervention_id">
                                            @foreach ($type_interventions as $type_intervention)
                                                <option selected value="{{ $type_intervention->id }}">
                                                    {{ $type_intervention->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
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
