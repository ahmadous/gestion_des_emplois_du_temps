@extends('layouts.app')

@section('title', 'liste des emplois_du_temps')

@section('content')
@if (auth()->user()->role=="professeur")
<div card>
    <div card-body>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Jour</th>
                        <th scope="col">Heure_debut sceance</th>
                        <th scope="col">heure fin de sceance</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Salle</th>
                        <th scope="col">matiere</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emplois_du_temps as $edt)
                         @if (auth()->user()->id==$edt->user_id)
                       <tr class="">
                            <td scope="row">{{$edt->jour}}</td>
                            <td scope="row">{{$edt->heure_debut}}</td>
                            <td scope="row">{{$edt->heure_fin}}</td>
                            <td scope="row">
                                @foreach ($classes as $classe )
                                    @if ($classe->id==$edt->classe_id)
                                        {{$classe->nom}}
                                    @endif
                                @endforeach
                            </td>
                            <td scope="row">
                                @foreach ($salles as $salle )
                                    @if ($salle->id==$edt->salle_id)
                                        {{$salle->nom}}
                                    @endif
                                @endforeach
                            </td>
                            <td scope="row">
                                @foreach ($matieres as $matiere )
                                    @if ($matiere->id==$edt->matiere_id)
                                        {{$matiere->nom}}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
            </table>
        </div>

    </div>
</div>

@endif
   @endsection
