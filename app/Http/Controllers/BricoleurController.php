<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bricoleur;
use App\Ville;
use App\User;
use App\Secteur;
class BricoleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $bricolers = Bricoleur::all();
         $secteurs = Secteur::all();
         $users = User::all();
         $villes = Ville::all();
        return view('bricolers.index',  compact('bricolers','villes','secteurs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $bricolers = Bricoleur::all();
         $secteurs = Secteur::all();
         $users = User::all();
         $villes = Ville::all();
        return view('bricolers.create',  compact('bricolers','villes','secteurs','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bricoler = new Bricoleur();
        $bricoler->nom = $request->input('nom');
        $bricoler->prenom = $request->input('prenom');
        $bricoler->lat = $request->input('lat');
        $bricoler->lng = $request->input('lng');
        $bricoler->email = $request->input('email');
        $bricoler->ville_id = $request->input('ville_id');
        $bricoler->secteur_id = $request->input('secteur_id');
        $bricoler->user_id = $request->input('user_id');
        $bricoler->telephone = $request->input('telephone');
        $bricoler->CIN = $request->input('CIN');
        $bricoler->email = $request->input('email');
        $bricoler->approuver = $request->input('approuver');
        if($request->hasFile('image')){            
            $path = $request->file('image')->store('bricolers');
            $bricoler->image=$path;
        }
        $bricoler->save();
        return redirect('bricoler')->with('success','Bricoler add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $bricoler = Bricoleur::find($id);
         $secteurs = Secteur::all();
         $users = User::all();
         $villes = Ville::all();
         return view('bricolers.edit',  compact('bricoler','villes','secteurs','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $bricoler =Bricoleur::find($id);
        $bricoler->nom = $request->input('nom');
        $bricoler->prenom = $request->input('prenom');
        $bricoler->email = $request->input('email');
           $bricoler->lat = $request->input('lat');
        $bricoler->lng = $request->input('lng');
        $bricoler->ville_id = $request->input('ville_id');
        $bricoler->secteur_id = $request->input('secteur_id');
        $bricoler->user_id = $request->input('user_id');
        $bricoler->telephone = $request->input('telephone');
        $bricoler->CIN = $request->input('CIN');
        $bricoler->email = $request->input('email');
           $bricoler->approuver = $request->input('approuver');
       if($request->hasFile('image')){            
            $path = $request->file('image')->store('bricolers');
            $bricoler->image=$path;
        }
        $bricoler->save();
        return redirect('bricoler')->with('success','Bricoler update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $bricoler =Bricoleur::find($id)->delete();
           return redirect('bricoler')->with('success','Bricoler deleted successfully');

    }
}
