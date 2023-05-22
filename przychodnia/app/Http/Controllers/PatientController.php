<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
class PatientController extends Controller
{
    //TODO    - metoda wyswietlajaca liste pacjentów
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Metoda do wyświetlania formularza edycji pacjenta
    public function edit($patient)
    {
        $patient = Patient::find($patient);
        return view('patients.edit', ['$patient' => $patient]);
    }

    // Metoda do aktualizacji pacjenta
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'login' => 'required|string|max:32|unique:patient',
            'firstName' => 'required|string|max:64',
            'lastName' => 'required|string|max:64',
//            'password' => 'required|min:5|confirmed'
        ]);

        $patient->update($request->all());


        return redirect()->route('/dashboard')->with('success', 'Dane pacjenta zostały zaktualizowane.');
    }

    // Metoda do usuwania pacjenta
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Pacjent został usunięty.');
    }


}
