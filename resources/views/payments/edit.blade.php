{{-- resources/views/payments/edit.blade.php --}}

@extends('layouts.app')

@section('title', 'Edit Payment')

@section('content')
<div class="container mt-4">
    <h2>Edit Payment</h2>
    <form method="POST" action="{{ route('payments.update', $payment->id) }}">
        @csrf
        @method('PUT') {{-- Directiva para especificar el método HTTP PUT --}}

        {{-- Campo desplegable para seleccionar la cita --}}
        <div class="mb-3">
            <label for="appointment_id" class="form-label">Appointment</label>
            <select class="form-select" id="appointment_id" name="appointment_id" required>
                @foreach ($appointments as $appointment)
                    <option value="{{ $appointment->id }}" {{ $appointment->id == $payment->appointment_id ? 'selected' : '' }}>
                        {{ $appointment->doctor->name }} - {{ $appointment->date->format('m/d/Y') }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Campo para el monto del pago --}}
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" min="0" step="0.01" required>
        </div>

        {{-- Campo para la fecha del pago --}}
        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ $payment->payment_date->format('Y-m-d') }}" required>
        </div>

        {{-- Botón para actualizar el pago --}}
        <button type="submit" class="btn btn-primary">Update Payment</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
