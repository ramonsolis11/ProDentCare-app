{{-- resources/views/specialties/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Specialties List')

@section('content')
<div class="container mt-4">
    <h2>Specialties</h2>
    <a href="{{ route('specialties.create') }}" class="btn btn-success mb-2">Add New Specialty</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specialties as $specialty)
                <tr>
                    <td>{{ $specialty->id }}</td>
                    <td>{{ $specialty->name }}</td>
                    <td>{{ $specialty->description }}</td>
                    <td>
                        <a href="{{ route('specialties.show', $specialty->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('specialties.edit', $specialty->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('specialties.destroy', $specialty->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
