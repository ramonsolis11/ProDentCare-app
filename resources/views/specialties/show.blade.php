@extends('layouts.app')

@section('title', 'Doctor Details')

@section('content')

<div class="container mt-4">
    <h2>Doctor Details</h2>
    <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
        @csrf  {{-- Token de seguridad --}}
        @method('PUT') {{-- Para enviar un método PUT en el formulario --}}
        {{-- Campo para el nombre --}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name', $doctor->name) }}"
                required>
        </div>

        {{-- Otros campos que necesites --}}

        {{-- Botón para guardar la nueva especialidad --}}
        <button type="submit" class="btn btn-primary">Save Doctor</button>
        {{-- Enlace para regresar a la lista de especialidades --}}
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

