<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\type_intervention;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class TypeInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_intervention = type_intervention::orderBy('id', 'DESC')->get();
        return view('type_intervention.listTypeIntervention', compact('type_intervention'));
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
        return view('type_intervention.createTypeIntervention');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'nom' => 'required',
            'duree' => 'required'
        ]);

        // instantiation
        $type_intervention =new type_intervention($request->all());

        //enregistrement
        $type_intervention->saveOrFail();

        return redirect()->route('type_intervention.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(type_intervention $type_intervention)
    {
        return view('type_intervention.showTypeIntervention', compact('type_intervention'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type_intervention $type_intervention)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }
        else{
            abort(403,'vous ne pouvez rien modifier');
        }
        return view('type_intervention.editTypeIntervention', compact('type_intervention'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, type_intervention $type_intervention)
    {
        // validation
        $request->validate([
            'nom' => 'required',
            'duree' => 'required'
        ]);

        //modification
        $type_intervention->update($request->all());

        return redirect()->route('type_intervention.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(type_intervention $type_intervention)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }
        if(!Gate::allow('access-admin')){
            abort(403,'vous ne pouvez rien modifier');
        }
        $type_intervention->delete();
        return redirect()->route('type_intervention.index');
    }
}