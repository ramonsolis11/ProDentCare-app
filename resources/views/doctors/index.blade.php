@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctors List</h1>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-2">Add New Doctor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Specialty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialty->name }}</td>
                    <td>
                        <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-info">View</a>
                        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
