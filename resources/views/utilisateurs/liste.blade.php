@extends('layouts.app')
@section('titre')
    lister departement
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p class="alert alert-primary">Liste des utilisateurs</p>
                    </blockquote>
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">email</th>
                                    <th scope="col">role</th>
                                    <th scope="col">Date de creation</th>
                                    @if (Gate::allows('access-admin'))
                                        @if (auth()->user()->role == 'admin')
                                            <th scope="col">Actions</th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>user
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="">
                                        <td scope="row">{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @if (Gate::allows('access-admin'))
                                            @if (auth()->user()->role == 'admin')
                                                <td>
                                                    <a href="{{ route('user.edit', compact('user')) }}"
                                                        class="btn btn-warning">Editer</a>
                                                    <form class="d-inline"
                                                        action="{{ route('user.destroy', compact('user')) }}"
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
                </div>
            </div>
        </div>
    </div>
@endsection
