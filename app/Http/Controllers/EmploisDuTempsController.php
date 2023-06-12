<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\salle;
use App\Models\classe;
use App\Models\creneau;
use App\Models\matiere;
use App\Models\type_intervention;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\emplois_du_temps;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class EmploisDuTempsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = classe::orderBy('id', 'desc')->get();
        return view('emplois_du_temps.listEmploisDuTemps', compact('classes'));
    }

    public function prof(){
        $matieres=matiere::all();
        $salles=salle::all();
        $type_interventions=type_intervention::all();
        $classes=classe::all();
        $emplois_du_temps=creneau::all();
        return view('emplois_du_temps.emploisDuTempsProf',[
            'emplois_du_temps'=>$emplois_du_temps,
            'classes'=>$classes,
            'type_interventions'=>$type_interventions,
            'salles'=>$salles,
            'matieres'=>$matieres
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            //
        }

    /**
     * Display the specified resource.
     */
    public function show(classe $classe, $id)
    {
        $creneaus=creneau::orderBy('jour')->get();
        $matieres=matiere::all();
        $salles=salle::all();
        $type_interventions=type_intervention::all();
        $users=User::all();
        return view('emplois_du_temps.showEmploisDuTemps' , compact('creneaus', 'matieres','id',
            'salles','type_interventions','users','classe'));
        // return redirect()->route('creneau.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(emplois_du_temps $emplois_du_temps, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, emplois_du_temps $emplois_du_temps,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(emplois_du_temps $emplois_du_temps)
    {
        //
    }
}
