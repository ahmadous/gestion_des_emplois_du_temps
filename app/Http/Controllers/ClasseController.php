<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres=filiere::all();
        $classes=classe::all();
        return view('classe.liste',compact('classes','filieres'));
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
        $filieres=filiere::all();
        return view('classe.new',compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classe=classe::all();
        $classe->nom =$request->nom;
        $classe->nombre =$request->nombre;
        $classe->filiere_id=$request->filiere_id;
        $classe=new classe($request->all());
        $classe->saveOrFail();
        return redirect()->route('classe.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(classe $classe, )
    {
        $filiere = filiere::all();
        return view('classe.show', compact('classe','filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(classe $classe)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }
        else{
            abort(403,'vous ne pouvez rien modifier');
        }
        $filieres=filiere::all();
        return view('classe.edit',compact('classe','filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, classe $classe)
    {
        $request->validate([
            'nom'=>'required',
            'filiere_id'=>'required',
        ]);
        $classe->updateOrFail($request->all());
        return redirect()->route('classe.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(classe $classe)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }
        else{
            abort(403,'vous ne pouvez rien modifier');
        }
        $classe->deleteOrFail();
        return redirect()->route('classe.index');
    }
}