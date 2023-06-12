@extends('layouts.app')

@section('titre', 'liste des type d\'nterventions')

@section('content')
    <div class="row-12">
        <div class="card">
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p class="alert alert-primary">listes des type_interventions</p>
                </blockquote>
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">N*</th>
                                <th scope="col">Nom</th>
                                <th scope="col">DUREE</th>
                                @if(Gate::allows('access-admin'))
                                    @if (auth()->user()->role=="admin")
                                       <th scope="col">Actions</th>
                                     @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($type_intervention as $type_intervention)
                                <tr class="">
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $type_intervention->nom }}</td>
                                    <td>{{ $type_intervention->duree }}</td>
                                    @if(Gate::allows('access-admin'))
                                        @if (auth()->user()->role=="admin")
                                            <td>
                                                <a href="{{ route('type_intervention.show', compact('type_intervention')) }}" class="btn btn-primary">Voir</a>

                                                <a href="{{ route('type_intervention.edit', compact('type_intervention')) }}" class="btn btn-warning">Editer</a>
                                                <form class="d-inline" action="{{ route('type_intervention.destroy', compact('type_intervention')) }}"
                                                    method="post">
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
                        <a href="{{ route('type_intervention.create') }}" class="btn btn-primary">Nouvelle type d'ntervention</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
