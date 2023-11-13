<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }


    public function create()
    {
        return view('patients.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'phone' => 'nullable|string',

        ]);

        Patient::create($validatedData);

        return redirect()->route('patients.index')
                        ->with('success', 'Patient created successfully.');
    }


    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }


    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }


    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'phone' => 'nullable|string',

        ]);

        $patient->update($validatedData);

        return redirect()->route('patients.index')
                        ->with('success', 'Patient updated successfully');
    }


    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
                        ->with('success', 'Patient deleted successfully');
    }
}


