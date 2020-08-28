<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\secteur;
class secteurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   
    public function create()
    {
        return view('secteur.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    //store user
    public function store(Request $request){
        $sector = new secteur();
        $sector->nom_secteur = $request['sector_name'];
        $sector->save();


        session()->flash('succes','Sector added succefuly');
        return redirect()->back();
    }
    public function listsectors(){
        $sectors = secteur::all();
        return view('secteur.list',['sectors'=>$sectors]);
    }
    public function sectorEdit($id){
        $sector = secteur::find($id);
        return view('secteur.edit',['sector'=>$sector]);
    }

    public function sectorUpdate(Request $request,$id)
    {
        
        $sector =  secteur::find($id);

        $sector->nom_secteur = $request['sector_name'];

        $sector->save();

        session()->flash('succes','sector updated succefuly');
        return redirect()->back();
    }

    /*Delete sector*/ 
    public function sectorDestroy($id){
        $sector = secteur::find($id);
        $sector->delete();
        session()->flash('succes','Sector Delete succefuly');
        return redirect()->back();
    }
}
