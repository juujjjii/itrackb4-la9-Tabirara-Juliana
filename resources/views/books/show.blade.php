@extends('layouts.app')

@section('title', $book['title'])

@section('content')
    <h1>{{ $book['title'] }}</h1>
    <ul class="list-group" style="max-width: 24rem;">
        <li class="list-group-item"><strong>ID:</strong> {{ $book['id'] }}</li>
        <li class="list-group-item"><strong>ISBN:</strong> {{ $book['isbn'] }}</li>
        <li class="list-group-item"><strong>Author:</strong> {{ $book['author'] }}</li>
        <li class="list-group-item"><strong>Pages:</strong> {{ $book['pages'] }}</li>
    </ul>

    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">← Back to Book List</a>
@endsection