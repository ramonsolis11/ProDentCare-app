{{-- resources/views/doctors/edit.blade.php --}}

@extends('layouts.app')

@section('title', 'Edit Doctor')

@section('content')
<div class="container mt-4">
    <h2>Edit Doctor</h2>
    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf
        @method('PUT') {{-- Directiva para especificar el método HTTP PUT --}}

        {{-- Campo para el nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}" required>
        </div>

        {{-- Campo para la especialidad --}}
        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>
            <select class="form-select" id="specialty" name="specialty_id" required>
                @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}" {{ $doctor->specialty_id == $specialty->id ? 'selected' : '' }}>
                        {{ $specialty->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Otros campos que necesites --}}

        {{-- Botón para actualizar la información del doctor --}}
        <button type="submit" class="btn btn-primary">Update Doctor</button>
        {{-- Enlace para regresar a la lista de doctores --}}
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
