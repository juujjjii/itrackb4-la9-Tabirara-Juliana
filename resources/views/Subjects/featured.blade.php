@extends('layouts.app')

@section('title', 'Featured Subject')

@section('content')
    <h1>Featured Subject</h1>

    <div class="card" style="max-width: 24rem;">
        <div class="card-body">
            <h2 class="card-title">{{ $featured['title'] }}</h2>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item"><strong>ID:</strong> {{ $featured['id'] }}</li>
                <li class="list-group-item"><strong>Code:</strong> {{ $featured['code'] }}</li>
                <li class="list-group-item"><strong>Units:</strong> {{ $featured['units'] }}</li>
            </ul>
            <a href="{{ route('subjects.index') }}" class="btn btn-primary">← Back to Subject List</a>
        </div>
    </div>
@endsection