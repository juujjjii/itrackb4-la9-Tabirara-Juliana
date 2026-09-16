@extends('layouts.app')

@section('title', 'Book Filter')

@section('content')
    <h1>Book Filter</h1>
    <p><strong>{{ $message }}</strong></p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book['id'] }}</td>
                <td>
                    <a href="{{ route('books.show', $book['id']) }}">
                        {{ $book['isbn'] }}
                    </a>
                </td>
                <td>{{ $book['title'] }}</td>
                <td>{{ $book['author'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">← Back to Book List</a>
@endsection