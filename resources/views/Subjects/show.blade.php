@extends('layouts.app')

@section('title', $subject['title'])

@section('content')
    <h1>{{ $subject['title'] }}</h1>
    <ul class="list-group" style="max-width: 24rem;">
        <li class="list-group-item"><strong>ID:</strong> {{ $subject['id'] }}</li>
        <li class="list-group-item"><strong>Code:</strong> {{ $subject['code'] }}</li>
        <li class="list-group-item"><strong>Units:</strong> {{ $subject['units'] }}</li>
    </ul>

    <a href="{{ route('subjects.index') }}" class="btn btn-secondary mt-3">← Back to Subject List</a>
@endsection