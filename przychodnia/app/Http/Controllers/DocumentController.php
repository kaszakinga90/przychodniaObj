<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPrescriptions() {

        $user = Auth::user()->getAuthIdentifier();
        //$userId = $user->id;

        $prescriptions = Document::where('Type', 'recepta')
                                ->where('PatientId', $user)
                                ->get();

        //return view('documents.showPrescriptions', ['$prescriptions'=>$prescriptions]);
        return view('documents.showPrescriptions')->with('prescriptions', $prescriptions);
    }
    public function showReferrals() {
        $user = Auth::user()->getAuthIdentifier();

        $referrals = Document::where('Type', 'skierowanie')
            ->where('PatientId', $user)
            ->get();

        return view('documents.showReferrals')->with('referrals', $referrals);
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
