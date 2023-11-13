{{-- resources/views/doctors/show.blade.php --}}

@extends('layouts.app')

@section('title', 'Doctor Details')

@section('content')
<div class="container mt-4">
    <h2>Doctor Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $doctor->name }}</h5>
            <p class="card-text"><strong>Specialty:</strong> {{ $doctor->specialty->name }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $doctor->user->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $doctor->phone }}</p>
            <!-- Asumiendo que tienes campos adicionales como 'phone' -->

            {{-- Otros detalles que quieras mostrar --}}

            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back to list</a>
        </div>
    </div>
</div>
@endsection

