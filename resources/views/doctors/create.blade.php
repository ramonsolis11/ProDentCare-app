{{-- resources/views/doctors/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Create New Doctor')

@section('content')
<div class="container mt-4">
    <h2>Create New Doctor</h2>
    <form method="POST" action="{{ route('doctors.store') }}">
        @csrf  {{-- Token de seguridad --}}

        {{-- Campo para el nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        {{-- Campo para la especialidad (puede ser un dropdown si tienes una lista de especialidades) --}}
        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>
            <select class="form-select" id="specialty" name="specialty_id" required>
                @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Otros campos que necesites --}}

        {{-- Botón para guardar el nuevo doctor --}}
        <button type="submit" class="btn btn-primary">Save Doctor</button>
        {{-- Enlace para regresar a la lista de doctores --}}
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection


