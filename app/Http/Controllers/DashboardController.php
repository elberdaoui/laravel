<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\bricoleur;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	$bricolers=bricoleur::all();
        return view('dashboard.index',compact('bricolers'));
    }

   
}
