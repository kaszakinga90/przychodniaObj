<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Instantiate a new PatientController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Metoda do wyświetlania formularza edycji pacjenta
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit', ['$patient' => $patient]);
    }

    // Metoda do aktualizacji pacjenta
    public function update(Request $request, $id)
    {

        $request->validate([
            'FirstName' => 'required|string|max:64',
            'LastName' => 'required|string|max:64',
            'BirthDate' => 'nullable|date',
            'PESEL' => 'nullable|digits:11'
            ],
            [
            'FirstName.max' => 'Imię nie może być dłuższe niż 64 znaki.',
            'FirstName.required' => 'Pole Imię musi być uzupełnione.',
            'LastName.max' => 'Nazwisko nie może być dłuższe niż 64 znaki.',
            'LastName.required' => 'Pole Nazwisko musi być uzupełnione.',
            'PESEL' => 'Numer PESEL musi składać się z 11 cyfr.',
            'BirthDate.date' => 'Wprowadź prawidłową datę w formacie yyyy-mm-dd.',
        ]);


        $patient = Patient::find($id);
        $date = date('Y-m-d');
        $date = $request->input('BirthDate');

        $patient->update(['FirstName' => $request->input('FirstName')]);
        $patient->update(['LastName' => $request->input('LastName')]);
        $patient->update(['BirthDate' => $date]);
        $patient->update(['PESEL' => $request->input('PESEL')]);

        return redirect()->route('dashboard')->with('success', 'Dane pacjenta zostały zaktualizowane.');
    }

    public function delete(Request $request, $id)
    {
        $patient = Patient::find($id);
        $dzis = date("Y-m-d");

        $visits = Visit::where('PatientId', '=', $id)->where('VisitDate', '>=', $dzis)->get();
        foreach ($visits as $v)
        {
            $visit = Visit::find($v->id);
            $visit->PatientId = null;
            $visit->save();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $patient->delete();
        return redirect()->route('dashboard')
            ->withSuccess('Twoje konto zostało usunięte.');
    }


}
