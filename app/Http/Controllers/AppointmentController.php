<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::all();

        return view('appointments.index', compact('appointments'));
    }


    public function create()
    {
        return view('appointments.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        Appointment::create($validatedData);

        
        return redirect()->route('appointments.index')
                        ->with('success', 'Appointment created successfully.');
    }


    public function show(Appointment $appointment)
    {
        
        return view('appointments.show', compact('appointment'));
    }


    public function edit(Appointment $appointment)
    {

        return view('appointments.edit', compact('appointment'));
    }


    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        $appointment->update($validatedData);


        return redirect()->route('appointments.index')
                        ->with('success', 'Appointment updated successfully.');
    }


    public function destroy(Appointment $appointment)
    {
        $appointment->delete();


        return redirect()->route('appointments.index')
                        ->with('success', 'Appointment cancelled successfully.');
    }
}

