<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPrescriptions() {
        $prescriptions = Document::all();
        /*
        $id = Auth::user()->id;
        $dzis = date("Y-m-d");

        $visits = Visit::whereHas('patient', function ($query) {
                        $query->where('PatientId', '=', '$id');
            })->get();
        */
        return view('documents.showPrescriptions', ['$prescriptions'=>$prescriptions]);
    }
    public function showReferrals() {
        $referrals = Document::all();
        /*
        $id = Auth::user()->id;
        $dzis = date("Y-m-d");

        $visits = Visit::whereHas('patient', function ($query) {
                        $query->where('PatientId', '=', '$id');
            })->get();
        */
        return view('documents.showReferrals', ['$referrals'=>$referrals]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
