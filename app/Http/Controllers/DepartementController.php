<?php

namespace App\Http\Controllers;

use App\Models\departement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = departement::all();
        return view('departement.liste', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }else{
            abort(403,'vous ne pouvez rien modifier');
        }
        return view('departement.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation du formulaire
        $request->validate([
            'nom' => 'required|unique:departements,nom',
        ]);
        // instanciation de departement à partir du formulaire
        $departement = new departement($request->all());

        // identifier l'id d'un utilisateur dans phpMyAdmin et l'associer à l'utilisateur
        $departement->saveOrFail();
        return redirect()->route('departement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(departement $departement)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }else{
            abort(403,'vous ne pouvez rien modifier');
        }
        return view('departement.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, departement $departement)
    {
        // validation du formulaire
        $request->validate([
            'nom' => 'required|unique:departements,nom,' . $departement->id,
        ]);
        $departement->updateOrFail($request->all());
        return redirect()->route('departement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departement $departement)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }else{
            abort(403,'vous ne pouvez rien modifier');
        }
        $departement->deleteOrFail();
        return redirect()->route('departement.index');
    }
}