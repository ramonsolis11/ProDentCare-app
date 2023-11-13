{{-- resources/views/payments/show.blade.php --}}

@extends('layouts.app')

@section('title', 'Payment Details')

@section('content')
<div class="container mt-4">
    <h2>Payment Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Payment #{{ $payment->id }}</h5>
            <p class="card-text"><strong>Appointment:</strong> {{ $payment->appointment->doctor->name }} on {{ $payment->appointment->date->format('m/d/Y') }}</p>
            <p class="card-text"><strong>Patient:</strong> {{ $payment->appointment->patient->name }}</p>
            <p class="card-text"><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
            <p class="card-text"><strong>Payment Date:</strong> {{ $payment->payment_date->format('m/d/Y') }}</p>
            <!-- Puedes añadir más detalles si es necesario -->

            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
