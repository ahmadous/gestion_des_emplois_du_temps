@extends('layouts.app')
@section('titre')
editer utilisateur
@endsection
@section('content')
<div class="container">
    <div class="row g-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Formulaire de modification - {{ $user->nom }}</h4>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach

                    <form action="{{ route('user.update', compact('user')) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="{{ old('name') ?? $user->name }}" class="form-control"
                                        name="name" id="name" aria-describedby="helpNomId">
                                    @error('name')
                                        <small id="helpNomId" class="form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option selected></option>
                                        <option value="etudiant">etudiant</option>
                                        <option value="professeur">professeur</option>
                                        <option value="admin">admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
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
