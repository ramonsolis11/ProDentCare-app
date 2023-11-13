@extends('layouts.app')

@section('title', 'Patients List')

@section('content')
    <h1>Patients List</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>
                        <a href="{{ route('patients.show', $patient) }}" class="btn btn-info">View</a>
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.btn-danger');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    if (!confirm('Are you sure you want to delete this patient?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection

