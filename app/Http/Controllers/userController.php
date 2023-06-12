<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('utilisateurs.liste',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('utilisateurs.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:Users,name',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'role'=>'required',
        // ]);

        // // instanciation de user à partir du formulaire
        // $user = new User($request->all());

        // // identifier l'id d'un user dans phpMyAdmin et l'associer à l'utilisateur
        // $user->saveOrFail();
        // return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role !="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }else{
            abort(403,'vous ne pouvez rien modifier');
        }
        return view('utilisateurs.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $user->role=$request->role;
        $user->updateOrFail($request->all());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Gate::allows('access-admin')){
            if(auth()->user()->role!="admin"){
                abort(403,'vous ne pouvez rien modifier');
            }
        }else{
            abort(403,'vous ne pouvez rien modifier');
        }
        $user->deleteOrFail();
        return redirect()->route('utilisateur.index');
    }
}