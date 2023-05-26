<?php

namespace App\Http\Controllers;

use App\Models\Patient;
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
    public function update(Request $request, $id)   //Patient $patient)
    {
        
        $request->validate([
            'login' => 'required|string|max:32',
            'FirstName' => 'required|string|max:64',
            'LastName' => 'required|string|max:64',
            'BirthDate' => 'nullable|date',
            'PESEL' => 'nullable|digits:11'
            //'PESEL' => 'nullable|min:11|max:11|numeric'
            ], 
            [
            'login.max' => 'Login nie może być dłuższy niż 32 znaki.',
            'login.required' => 'Pole Login musi być uzupełnione.',
            'FirstName.max' => 'Imię nie może być dłuższe niż 64 znaki.',
            'FirstName.required' => 'Pole Imię musi być uzupełnione.',
            'LastName.max' => 'Nazwisko nie może być dłuższe niż 64 znaki.',
            'LastName.required' => 'Pole Nazwisko musi być uzupełnione.',
            'PESEL' => 'Numer PESEL musi składać się z 11 cyfr.',
            'BirthDate.date' => 'Wprowadź prawidłową datę w formacie yyyy-mm-dd.',
        ]);
        

        $patient = Patient::find($id);
        //$patient->update($request->all());
        $date = date('Y-m-d');
        $date = $request->input('BirthDate');
        
        $patient->update(['login' => $request->input('login')]);
        $patient->update(['FirstName' => $request->input('FirstName')]);
        $patient->update(['LastName' => $request->input('LastName')]);
        $patient->update(['BirthDate' => $date]);
        $patient->update(['PESEL' => $request->input('PESEL')]);

        return redirect()->route('dashboard')->with('success', 'Dane pacjenta zostały zaktualizowane.');
    }

    // Metoda do usuwania pacjenta
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Pacjent został usunięty.');
    }

    //public function delete(Request $request, $id)
    public function delete(Request $request, $id)
    {
        $patient = Patient::find($id);

        //Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $patient->delete();
        return redirect()->route('dashboard')
            ->withSuccess('Twoje konto zostało usunięte.');
    }


}
