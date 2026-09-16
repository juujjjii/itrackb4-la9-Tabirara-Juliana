@extends('layouts.app')

@section('title', 'My Book List')

@section('content')
    <h1>My Book List</h1>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Pages</th>
        </tr>

        @forelse ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book['id'] }}</td>
            <td>
                <a href="{{ route('books.show', $book['id']) }}">
                    {{ $book['isbn'] }}
                </a>
            </td>
            <td>{{ $book['title'] }}</td>
            <td>
                @if ($book['pages'] >= 300)
                    <strong>{{ $book['pages'] }} (Long Read)</strong>
                @else
                    {{ $book['pages'] }}
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No books have been added yet. Check back once some are added.</td>
        </tr>
        @endforelse
    </table>
@endsection