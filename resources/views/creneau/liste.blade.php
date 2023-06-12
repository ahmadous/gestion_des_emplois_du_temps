@extends('layouts.app')
@section('titre')
lister creneau
@endsection
@section('content')
<div class="row-12">
    <div class="col">
        <div class="card">
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p class="alert alert-primary">Liste des creneaus</p>
            </blockquote>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col"  class="text-uppercase">classe</th>
                            <th scope="col" class="text-uppercase">heure_debut</th>
                            <th scope="col" class="text-uppercase">heure_fin</th>
                            <th scope="col" class="text-uppercase">jour</th>
                            <th scope="col" class="text-uppercase">matiere</th>
                            <th scope="col" class="text-uppercase">professeur</th>
                            <th scope="col" class="text-uppercase">nature d'intervention</th>
                            <th scope="col" class="text-uppercase">salle</th>
                            <th scope="col" class="text-uppercase">date de creation</th>
                            @if(Gate::allows('access-admin'))
                                @if(auth()->user()->role=="admin")
                                 <th scope="col">Actions</th>
                                @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($creneaus as $creneau)
                        <tr class="">
                            <td scope="row">{{$loop->index+1}}</td>
                            @foreach ($classes as $classe)
                                @if($creneau->classe_id==$classe->id)
                                  <td>{{ $classe->nom }}</td>
                                @endif
                            @endforeach
                            <td>{{ $creneau->heure_debut }}</td>
                            <td>{{ $creneau->heure_fin }}</td>
                            <td>{{ $creneau->jour }}</td>
                            @foreach ($matieres as $matiere)
                                @if($creneau->matiere_id==$matiere->id)
                                   <td>{{ $matiere->nom }}</td>
                                @endif
                            @endforeach
                            @foreach ($users as $user)
                                @if($creneau->user_id==$user->id)
                                    <td>{{ $user->name }}</td>
                                @endif
                            @endforeach
                            @foreach ($type_interventions as $type_intervention)
                                @if($creneau->type_intervention_id==$type_intervention->id)
                                    <td>{{ $type_intervention->nom }}</td>
                                @endif
                            @endforeach
                            @foreach ($salles as $salle)
                                @if($creneau->salle_id==$salle->id)
                                    <td>{{ $salle->nom }}</td>
                                @endif
                            @endforeach
                            <td>{{ $creneau->created_at}}</td>
                            @if(Gate::allows('access-admin'))
                                @if(auth()->user()->role=="admin")
                                    <td>
                                        <a href="{{route('creneau.edit',compact('creneau'))}}" class="btn btn-warning">Editer</a>
                                        <form class="d-inline" action="{{ route('creneau.destroy', compact('creneau')) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                @endif
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(Gate::allows('access-admin'))
                @if(auth()->user()->role=="admin")
                   <a href="{{ route('creneau.create') }}" class="btn btn-primary my-3">inserer un creneau</a>
                @endif
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
