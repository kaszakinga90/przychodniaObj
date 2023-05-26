<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

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

    public function bookVisit($spec = null, $day = null) {
        $dzis = date("Y-m-d");
        $specs = Doctor::select('Specialization')->distinct()->orderBy('Specialization', 'asc')->get();
        $days = Visit::select('VisitDate')->distinct()->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc')->get();
        $visits = Visit::all();
        if ($spec != null)
        {
            $doctorIds = Doctor::where('Specialization', $spec)->distinct()->pluck('DoctorId');
            $visits = Visit::whereIn('DoctorId', $doctorIds)->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc')->get();
        }
        if ($day != null)
        {
            $visits = Visit::where('VisitDate', '>=', $day)->get();
        }

        /*
        $id = Auth::user()->id;
        $dzis = date("Y-m-d");

        $visits = Visit::whereHas('patient', function ($query) {
                        $query->where('PatientId', '=', '$id');
            })->get();
        */
		return view('visits.bookVisit', ['visits'=>$visits, 'days'=>$days, 'specializations'=>$specs]);
	}
    
    public function index(Request $request) {
        $dzis = date("Y-m-d");
        $specs = Doctor::select('Specialization')->distinct()->orderBy('Specialization', 'asc')->get();
        $days = Visit::select('VisitDate')->distinct()->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc')->get();
        
        $spec = $request->input('spec');
        if(!empty($spec))
        {            
            $doctorIds = Doctor::where('Specialization', $spec)->distinct()->pluck('DoctorId');
            $visits = Visit::whereIn('DoctorId', $doctorIds)->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc')->get();
        }
        else {
            $spec = Doctor::select('Specialization')->distinct()->orderBy('Specialization', 'asc')->first();
            $visits = Visit::all();
        }

        $visits = $this->applyFilters($request);
        //nie działa
        //$visits = Visit::where('VisitDate', '>=', $dzis)->applyFilters($request)->orderBy('VisitDate', 'asc')->get();

        return view('visits.bookVisit', ['visits'=>$visits, 'days'=>$days, 'specializations'=>$specs, 'spec'=>$spec]);
    }

    public function applyFilters(Request $request) {
        $query = Visit::query();
        $dzis = date("Y-m-d");

        if ($spec = $request->input('spec')) {
            $doctorIds = Doctor::where('Specialization', $spec)->distinct()->pluck('DoctorId');
            $query->whereIn('DoctorId', $doctorIds);
        }
        
        if ($day = $request->input('date')) {
            $query->where('VisitDate', '>=', $day);
        }
        $query->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc');

        return $query->get();
    }

}
