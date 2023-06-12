@extends('layouts.app')
@section('titre')
lister classe
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p class="alert alert-primary">Liste des classes</p>
            </blockquote>
            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">filiere d'appartenance</th>
                            <th scope="col">date de creation</th>
                            @if(Gate::allows('access-admin'))
                                @if (auth()->user()->role=="admin")
                                   <th scope="col">Actions</th>
                                @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $classe)
                        <tr class="">
                            <td scope="row">{{$loop->index+1}}</td>
                            <td>{{ $classe->nom }}</td>
                            <td>{{ $classe->nombre }}</td>
                            @foreach ($filieres as $filiere)
                                @if($classe->filiere_id==$filiere->id)

                            <td>{{ $filiere->nom }}</td>
                                @endif
                            @endforeach
                            <td>{{ $classe->created_at}}</td>
                            @if(Gate::allows('access-admin'))
                                @if (auth()->user()->role=="admin")
                                    <td>
                                        <a href="{{route('classe.show',compact('classe'))}}" class="btn btn-warning">Voir</a>
                                        <a href="{{route('classe.edit',compact('classe'))}}" class="btn btn-warning">Editer</a>
                                        <form class="d-inline" action="{{ route('classe.destroy', compact('classe')) }}" method="post">
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
                @if (auth()->user()->role=="admin")
                <a href="{{ route('classe.create') }}" class="btn btn-primary my-3">Nouvelle classe</a>
                @endif
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
