<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//    public function showPrescriptions() {
//
//        $user = Auth::user()->getAuthIdentifier();
//        //$userId = $user->id;
//
//        $prescriptions = Document::where('Type', 'recepta')
//                                ->where('PatientId', $user)
//                                ->get();
//
//        //return view('documents.showPrescriptions', ['$prescriptions'=>$prescriptions]);
//        return view('documents.showPrescriptions')->with('prescriptions', $prescriptions);
//    }

    public function showPrescriptions(Request $request) {

        $user = Auth::user()->getAuthIdentifier();
        //$userId = $user->id;

        $prescriptions = Document::where('Type', 'recepta')
            ->where('PatientId', $user);

        // Filtrowanie po lekarzu
        if ($request->has('doctor')) {
            $doctorId = $request->input('doctor');
            $prescriptions->where('DoctorId', $doctorId);
        }


        $prescriptions = $prescriptions->get();

        $doctors = Doctor::all();

        return view('documents.showPrescriptions', compact('prescriptions', 'doctors'));

    }


    public function showReferrals() {
        $user = Auth::user()->getAuthIdentifier();

        $referrals = Document::where('Type', 'skierowanie')
            ->where('PatientId', $user)
            ->get();

        return view('documents.showReferrals')->with('referrals', $referrals);
    }



}
