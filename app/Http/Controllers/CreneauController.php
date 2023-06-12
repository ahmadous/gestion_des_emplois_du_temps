<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\salle;
use App\Models\classe;
use App\Models\creneau;
use App\Models\matiere;
use Illuminate\Http\Request;
use App\Models\type_intervention;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CreneauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = matiere::all();
        $salles = salle::all();
        $type_interventions = type_intervention::all();
        $users = User::all();
        $creneaus = creneau::all();
        $classes = classe::all();
        return view('creneau.liste', [
            'users' => $users,
            'classes' => $classes,
            'matieres' => $matieres,
            'salles' => $salles,
            'type_interventions' => $type_interventions,
            'creneaus' => $creneaus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('access-admin')) {
            if (auth()->user()->role != "admin") {
                abort(403, 'vous ne pouvez rien modifier');
            }
        } else {
            abort(403, 'vous ne pouvez rien modifier');
        }
        $matieres = matiere::all();
        $salles = salle::all();
        $type_interventions = type_intervention::all();
        $users = User::all();
        $classes = classe::all();
        $creneaus = creneau::all();
        $error = "";
        return view('creneau.new', [
            'users' => $users,
            'classes' => $classes,
            'matieres' => $matieres,
            'salles' => $salles,
            'type_interventions' => $type_interventions,
            'creneaus' => $creneaus,
            'error' => $error,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $error = "";
        $creneaus = creneau::all();
        $a = 1;
        $salles = salle::all();
        $classes = classe::all();
        foreach ($creneaus as $creneau) {
            if ($creneau->jour == strval($request->jour)) {
                if ($creneau->heure_debut == $request->heure_debut) {
                    if ($creneau->salle_id == $request->salle_id) {
                        $a = 0;
                        $error = "redondance salle sur la meme heure et le meme jour";
                        break;
                    } else if ($creneau->classe_id == $request->classe_id) {
                        $a = 0;
                        $error = "redondance classe sur la meme heure et le meme jour";
                        break;
                    } else if ($creneau->user_id == $request->user_id) {
                        $a = 0;
                        $error = "redondance professeur sur la meme heure et le meme jour";
                        break;
                    } else {
                        $a = 1;
                    }
                    $a = 1;
                }
            }
            if ($request->heure_debut >= $request->heure_fin) {
                $a = 0;
                $error = "l'heure debut ne peut ni etre superieur ni inferieur a l'heure de fin";
                break;
            }
            if (($request->heure_fin - $request->heure_debut) > 4) {
                $a = 0;
                $error = "la duree de sceance ne doit pas etre superieur a 4h";
                break;
            } else {
                $a = 1;
            }
        }
        foreach ($classes as $classe) {
            if ($request->classe_id == $classe->id) {
                foreach ($salles as $salle) {
                    if ($request->salle_id == $salle->id) {
                        if ($classe->nombre > $salle->nombre) {
                            $a = 0;
                            $error = "la salle est trop petite pour contenir cette classe";
                            break;
                        }
                    }
                }
                break;
            }
        }
        if ($a == 1) {
            $creneaus->jour = $request->jour;
            $creneaus->heure_debut = $request->heure_debut;
            $creneaus->heure_fin = $request->heure_fin;
            $creneaus->salle_id=$request->salle_id;
            $creneaus->classe_id=$request->classe_id;
            $creneaus->matiere_id=$request->matiere_id;
            $creneaus->user_id=$request->user_id;
            $creneaus->type_intervention_id=$request->type_intervention_id;

        } else {
            $matieres = matiere::all();
            $salles = salle::all();
            $type_interventions = type_intervention::all();
            $users = User::all();
            $classes = classe::all();
            $creneaus = creneau::all();
            return view('creneau.new', [
                'users' => $users,
                'classes' => $classes,
                'matieres' => $matieres,
                'salles' => $salles,
                'type_interventions' => $type_interventions,
                'creneaus' => $creneaus,
                'error' => $error,
            ]);
        }
        $creneaus = new creneau($request->all());
        $creneaus->saveOrFail();
        return redirect()->route('creneau.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(creneau $creneau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(creneau $creneau)
    {
        $error = "";
        if (Gate::allows('access-admin')) {
            if (auth()->user()->role != "admin") {
                abort(403, 'vous ne pouvez rien modifier');
            }
        } else {
            abort(403, 'vous ne pouvez rien modifier');
        }
        $matieres = matiere::all();
        $salles = salle::all();
        $type_interventions = type_intervention::all();
        $users = User::all();
        $classes = classe::all();
        return view('creneau.edit', [
            'users' => $users,
            'classes' => $classes,
            'matieres' => $matieres,
            'salles' => $salles,
            'type_interventions' => $type_interventions,
            'creneau' => $creneau,
            'error' => $error
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, creneau $creneau)
    {
        $error="";
        $creneaus = creneau::all();
        $a = 0;
        $salles = salle::all();
        $classes = classe::all();
         foreach ($creneaus as $creneau) {
            if ($creneau->jour == strval($request->jour)) {
                if ($creneau->heure_debut == $request->heure_debut) {
                    if ($creneau->salle_id == $request->salle_id) {
                        $a = $a+1;
                        $error = "redondance salle sur la meme heure et le meme jour";

                    } else if ($creneau->classe_id == $request->classe_id) {
                        $a = $a+1;
                        $error = "redondance classe sur la meme heure et le meme jour";

                    } else if ($creneau->user_id == $request->user_id) {
                        $a = $a+1;
                        $error = "redondance professeur sur la meme heure et le meme jour";

                    } else {
                        $a=$a;
                    }
                    $a=$a;
                }
                $a=$a;
            }
            if ($request->heure_debut >= $request->heure_fin) {
                $a = $a+1;
                $error = "l'heure debut ne peut ni etre superieur ni inferieur a l'heure de fin";
            }
            if (($request->heure_fin - $request->heure_debut) > 4) {
                $a = $a+1;
                $error = "la duree de sceance ne doit pas etre superieur a 4h";
            } else {
                $a = $a;
            }
        }
        foreach ($classes as $classe) {
            if ($request->classe_id == $classe->id) {
                foreach ($salles as $salle) {
                    if ($request->salle_id == $salle->id) {
                        if ($classe->nombre > $salle->nombre) {
                            $a = $a+1;
                            $error = "la salle est trop petite pour contenir cette classe";
                            break;
                        }
                    }
                }
                break;
            }
        }
        if ($a <= 1) {
            $creneau->jour = $request->jour;
            $creneau->heure_debut = $request->heure_debut;
            $creneau->heure_fin = $request->heure_fin;
            $creneau->salle_id = $request->salle_id;
            $creneau->matiere_id = $request->matiere_id;
            $creneau->user_id = $request->user_id;
            $creneau->classe_id = $request->classe_id;
            $creneau->type_intervention_id = $request->type_intervention_id;
            $creneau->updateOrFail($request->all());
            return redirect()->route('creneau.index');
        } else {
            $matieres = matiere::all();
            $salles = salle::all();
            $type_interventions = type_intervention::all();
            $users = User::all();
            $classes = classe::all();
        return view('creneau.edit', [
            'users' => $users,
            'classes' => $classes,
            'matieres' => $matieres,
            'salles' => $salles,
            'type_interventions' => $type_interventions,
            'creneau' => $creneau,
            'error' => $error]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(creneau $creneau)
    {
        if (Gate::allows('access-admin')) {
            if (auth()->user()->role != "admin") {
                abort(403, 'vous ne pouvez rien modifier');
            }
        } else {
            abort(403, 'vous ne pouvez rien modifier');
        }
        $creneau->deleteOrFail();
        return redirect()->route('creneau.index');
    }
}