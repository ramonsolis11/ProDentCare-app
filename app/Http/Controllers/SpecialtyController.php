<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }


    public function create()
    {
        return view('specialties.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Specialty::create($request->all());

        return redirect()->route('specialties.index')
                        ->with('success','Specialty created successfully.');
    }


    public function show(Specialty $specialty)
    {
        return view('specialties.show', compact('specialty'));
    }


    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }


    public function update(Request $request, Specialty $specialty)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $specialty->update($request->all());

        return redirect()->route('specialties.index')
                        ->with('success','Specialty updated successfully.');
    }


    public function destroy(Specialty $specialty)
    {
        $specialty->delete();

        return redirect()->route('specialties.index')
                        ->with('success','Specialty deleted successfully.');
    }
}

