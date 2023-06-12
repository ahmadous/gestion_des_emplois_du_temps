<?php

namespace App\Http\Controllers;

use App\Models\salle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = salle::all();
        return view('salle.liste', compact('salles'));
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
        }
        else{
            abort(403,'vous ne pouvez rien modifier');
        }
        return view('salle.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'nombre' => 'required',
        ]);
        // instanciation de departement à partir du formulaire
        salle::create($request->all());
        return redirect()->route('salle.index')->with('success', 'salle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(salle $salle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(salle $salle)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }
        else{
            abort(403,'vous ne pouvez rien modifier');
        }
        return view('salle.edit', compact('salle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salle $salle)
    {
        $request->validate([
            'nom' => 'required|unique:departements,nom,' . $salle->id,
            'nombre' => 'required',
        ]);
        $salle->updateOrFail($request->all());
        return redirect()->route('salle.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salle $salle)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }else{
            abort(403,'vous ne pouvez rien modifier');
        }
        $salle->deleteOrFail();
        return redirect()->route('salle.index');
    }
}