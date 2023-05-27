<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

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
		$id = Auth::user()->id;
        $dzis = date("Y-m-d");
        $visits = Visit::where('PatientId', '=', $id)->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc')->orderBy('VisitTime', 'asc')->get();

		return view('visits.showPlanned', ['visits'=>$visits]);
	}

    public function cancel($VisitId) {
        $visit = Visit::find($VisitId);
        $visit->PatientId = null;
        $visit->save();

        return redirect()->route('dashboard')
            ->withSuccess('Pomyślnie odwołano wizytę.');
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
        $query->where('PatientId', '=', null)->where('VisitDate', '>=', $dzis)->orderBy('VisitDate', 'asc')->orderBy('VisitTime', 'asc');

        return $query->get();
    }

    public function bookVisit($VisitId) {
        $visit = Visit::find($VisitId);
        $patientId = Auth::user()->id;
        $visit->PatientId = $patientId;
        $visit->save();
        $doctor = Doctor::find($visit->DoctorId);
        
        return redirect()->route('dashboard')
            ->withSuccess('Pomyślnie dokonano zapisu do dr ' . $doctor->FirstName . " " . $doctor->LastName . 
                " na dzień " . $visit->VisitDate . " o godzinie " . $visit->VisitTime . ".");
	}

    public function history() {
		$id = Auth::user()->id;
        $dzis = date("Y-m-d");
        $visits = Visit::where('PatientId', '=', $id)->where('VisitDate', '<', $dzis)->orderBy('VisitDate', 'desc')->orderBy('VisitTime', 'desc')->get();

		return view('visits.history', ['visits'=>$visits]);
	}
}
