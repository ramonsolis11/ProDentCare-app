@extends('layouts.app')

@section('title', 'Add New Patient')

@section('content')
    <h1>Add New Patient</h1>
    <form method="POST" action="{{ route('patients.store') }}">
        @csrf
        <!-- Form fields -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <!-- More fields here -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

