{{-- resources/views/appointments/edit.blade.php --}}

@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')
<div class="container mt-4">
    <h2>Edit Appointment</h2>
    <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT') {{-- Directiva para especificar el método HTTP PUT --}}

        {{-- Campo para seleccionar el doctor --}}
        <div class="mb-3">
            <label for="doctor_id" class="form-label">Doctor</label>
            <select class="form-select" id="doctor_id" name="doctor_id" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Campo para seleccionar el paciente --}}
        <div class="mb-3">
            <label for="patient_id" class="form-label">Patient</label>
            <select class="form-select" id="patient_id" name="patient_id" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Campo para la fecha de la cita --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $appointment->date->format('Y-m-d') }}" required>
        </div>

        {{-- Campo para la hora de la cita --}}
        <div class="mb-3">
            <label for="time" class="form-label
            ">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ $appointment->time->format('H:i') }}" required>
        </div>

            {{-- Campo para el precio de la cita --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $appointment->price }}" required>
        </div>

        {{-- Campo para el estado de la cita --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

            {{-- Botón para actualizar la cita --}}
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

