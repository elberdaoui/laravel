<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ville;
class villeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   
    public function create()
    {
        return view('villes.create');
    }

    public function store(Request $request){
        $ville = new ville();
        $ville->nom_ville = $request['ville'];
        $ville->save();


        session()->flash('succes','City added succefuly');
        return redirect()->back();
    }
    public function listvilles(){
        $villes = ville::all();
        return view('villes.list',['villes'=>$villes]);
    }

    public function villeEdit($id){
        $ville = ville::find($id);
        return view('villes.edit',['ville'=>$ville]);
    }


    public function villeUpdate(Request $request,$id)
    {
        
        $ville =  ville::find($id);

        $ville->nom_ville = $request['ville'];

        $ville->save();

        session()->flash('succes','City updated succefuly');
        return redirect()->back();
    }

    /*Delete sector*/ 
    public function villeDestroy($id){
        $ville = ville::find($id);
        $ville->delete();
        session()->flash('succes','City Delete succefuly');
        return redirect()->back();
    }
}
