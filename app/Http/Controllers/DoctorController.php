<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors.index', compact('doctors'));
    }


    public function create()
    {

        return view('doctors.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        $doctor = Doctor::create($validatedData);


        return redirect()->route('doctors.index')
                        ->with('success', 'Doctor created successfully.');
    }


    public function show(Doctor $doctor)
    {

        return view('doctors.show', compact('doctor'));
    }


    public function edit(Doctor $doctor)
    {

        return view('doctors.edit', compact('doctor'));
    }


    public function update(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')
                        ->with('success', 'Doctor updated successfully.');
    }


    public function destroy(Doctor $doctor)
    {
        $doctor->delete();


        return redirect()->route('doctors.index')
                        ->with('success', 'Doctor deleted successfully.');
    }
}

