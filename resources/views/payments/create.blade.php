{{-- resources/views/payments/create.blade.php --}}

@extends('layouts.app')

@section('title', 'Record New Payment')

@section('content')
<div class="container mt-4">
    <h2>Record New Payment</h2>
    <form method="POST" action="{{ route('payments.store') }}">
        @csrf  {{-- Token CSRF para proteger el formulario --}}

        {{-- Campo desplegable para seleccionar la cita --}}
        <div class="mb-3">
            <label for="appointment_id" class="form-label">Appointment</label>
            <select class="form-select" id="appointment_id" name="appointment_id" required>
                <option value="">Select an appointment</option>
                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}">
                        {{ $appointment->doctor->name }} - {{ $appointment->date->format('m/d/Y') }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Campo para el monto del pago --}}
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" min="0" step="0.01" required>
        </div>

        {{-- Campo para la fecha del pago --}}
        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>

        {{-- Botón para guardar el nuevo pago --}}
        <button type="submit" class="btn btn-success">Save Payment</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
