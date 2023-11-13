@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
    <h1>Edit Patient</h1>
    <form method="POST" action="{{ route('patients.update', $patient) }}">
        @csrf
        @method('PUT')
        <!-- Form fields with default values -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
        </div>
        <!-- More fields here -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

