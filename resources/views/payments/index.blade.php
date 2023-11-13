{{-- resources/views/payments/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Payments')

@section('content')
<div class="container mt-4">
    <h2>Payments</h2>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">Record New Payment</a>
    <table class="table table-hover mt-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Appointment</th>
                <th scope="col">Patient</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->appointment_id }}</td> {{-- Asumiendo que quieres mostrar el ID de la cita --}}
                <td>{{ $payment->patient->name }}</td> {{-- Asumiendo que hay una relación 'patient' en el modelo 'Payment' --}}
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_date->format('m/d/Y') }}</td> {{-- Formatear fecha según preferencias --}}
                <td>
                    <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
