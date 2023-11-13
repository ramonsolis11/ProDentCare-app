{{-- resources/views/appointments/show.blade.php --}}

@extends('layouts.app')

@section('title', 'View Appointment')

@section('content')
<div class="container mt-4">
    <h2>Appointment Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Appointment with {{ $appointment->doctor->name }}</h5>
            <p class="card-text"><strong>Patient:</strong> {{ $appointment->patient->name }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $appointment->date->format('m/d/Y') }}</p>
            <p class="card-text"><strong>Time:</strong> {{ $appointment->time }}</p>
            <p class="card-text"><strong>Type:</strong> {{ $appointment->type }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $appointment->status }}</p>
            <!-- Añade aquí más detalles si es necesario -->

            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection

