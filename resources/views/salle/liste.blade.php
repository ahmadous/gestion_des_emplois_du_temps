@extends('layouts.app')
@section('titre')
lister salle
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p class="alert alert-primary">Liste des salles 
              </p>
            </blockquote>
            <div class="table-responsive-sm">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">N°</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Nombre de Place</th>
                            <th scope="col">Date de creation</th>
                            @if(Gate::allows('access-admin'))
                                @if (auth()->user()->role=="admin")
                                    <th scope="col">Actions</th>
                                @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salles as $salle)
                        <tr class="">
                            <td scope="row">{{$loop->index+1}}</td>
                            <td>{{ $salle->nom }}</td>
                            <td>{{ $salle->nombre }}</td>
                            <td>{{ $salle->created_at}}</td>
                            @if(Gate::allows('access-admin'))
                                @if (auth()->user()->role=="admin")
                                    <td>
                                        <a href="{{route('salle.edit',compact('salle'))}}" class="btn btn-warning">Editer</a>
                                        <form class="d-inline" action="{{ route('salle.destroy', compact('salle')) }}" method="post">
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
                    <a href="{{ route('salle.create') }}" class="btn btn-primary my-3">Nouvelle salle</a>
                @endif
            @endif
        </div>
        </div>
    </div>
</div>
@endsection
