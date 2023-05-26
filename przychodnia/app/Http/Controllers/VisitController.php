<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
    * Instantiate a new VisitController instance.
    */    
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function showPlanned() {
		$visits = Visit::all();
        /*
        $id = Auth::user()->id;
        $dzis = date("Y-m-d");

        $visits = Visit::whereHas('patient', function ($query) {
                        $query->where('PatientId', '=', '$id');
            })->get();
        */
		return view('visits.showPlanned', ['visits'=>$visits]);
	}
}
