@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

<div class="container mt-4">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create Appointment</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Doctor</th>
                <th scope="col">Patient</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Type</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->doctor->name }}</td>
            <td>{{ $appointment->patient->name }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>{{ $appointment->type }}</td>
            <td>
                <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-link">View</a>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-link">Edit</a>
                <form method="POST" action="{{ route('appointments.destroy', $appointment->id) }}" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

