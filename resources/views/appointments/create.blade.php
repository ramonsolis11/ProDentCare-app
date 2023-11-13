{{-- resources/views/appointments/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Create Appointment')

@section('content')
<div class="container mt-4">
    <h2>Create Appointment</h2>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf  {{-- CSRF token for security --}}

        {{-- Doctor selection --}}
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Doctor</label>
            <select class="form-select" id="doctor_id" name="doctor_id" required>
                <option value="">Select a doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Patient selection --}}
        <div class="mb-3">
            <label for="patient_id" class="form-label">Patient</label>
            <select class="form-select" id="patient_id" name="patient_id" required>
                <option value="">Select a patient</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Appointment date --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        {{-- Appointment time --}}
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>

        {{-- Appointment type --}}
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>

        {{-- Submit button --}}
        <button type="submit" class="btn btn-primary">Save Appointment</button>
    </form>
</div>
@endsection

