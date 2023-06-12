@extends('layouts.app')

@section('title', 'creation de notification')

@section('content')
    <div class="container">
        <div class="row g-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire d'ajout d'une notification</h4>
                        <form action="{{ route('notification.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="titre" class="form-label">TITRE</label>
                                        <input type="text" class="form-control" name="titre" id="titre"
                                            aria-describedby="helptitreId" placeholder="titre de la notification" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label"></label>
                                        <textarea class="form-control" name="description" id="description" rows="3">DESCRIPTION</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="reset" class="btn btn-secondary">Vider</button>
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
