@extends('layouts.app')

@section('title', 'Create New Specialty')

@section('content')

<div class="container mt-4">
    <h2>Create New Specialty</h2>
    <form method="POST" action="{{ route('specialties.store') }}">
        @csrf  {{-- Token de seguridad --}}

        {{-- Campo para el nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control"
                id="name"
                name="name"
                required>
        </div>

        {{-- Otros campos que necesites --}}

        {{-- Botón para guardar la nueva especialidad --}}
        <button type="submit" class="btn btn-primary">Save Specialty</button>
        {{-- Enlace para regresar a la lista de especialidades --}}
        <a href="{{ route('specialties.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
