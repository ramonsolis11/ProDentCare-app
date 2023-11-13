@extends('layouts.app')

@section('title', 'View Patient')

@section('content')
    <h1>View Patient: {{ $patient->name }}</h1>
    <!-- Patient details here -->
    <p><strong>ID:</strong> {{ $patient->id }}</p>
    <p><strong>Name:</strong> {{ $patient->name }}</p>
    <p><strong>Address:</strong> {{ $patient->address }}</p>
    <p><strong>Phone:</strong> {{ $patient->phone }}</p>
    <p><strong>Birthdate:</strong> {{ $patient->birthdate->format('m/d/Y') }}</p>

    <a href="{{ route('patients.index') }}" class="btn btn-info">Back</a>
@endsection



