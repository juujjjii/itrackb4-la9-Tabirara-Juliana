@extends('layouts.app')

@section('title', 'My Subjects List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">My Subjects List</h1>
        <a href="{{ route('subjects.create') }}" class="btn btn-success">+ Add Subject</a>
    </div>

    <div class="mb-3">
        <strong>Filter by code:</strong>
        @foreach (array_unique(array_column($allSubjects, 'code')) as $c)
            <a href="{{ route('subjects.index', ['code' => $c, 'units' => $units]) }}"
               class="btn btn-sm {{ $code === $c ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ $c }}
            </a>
        @endforeach
    </div>

    <div class="mb-3">
        <strong>Filter by units:</strong>
        @foreach (array_unique(array_column($allSubjects, 'units')) as $u)
            <a href="{{ route('subjects.index', ['code' => $code, 'units' => $u]) }}"
               class="btn btn-sm {{ (string) $units === (string) $u ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ $u }} units
            </a>
        @endforeach
    </div>

    <p>
        <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-secondary">Clear filters</a>
    </p>

    <p>
        @if ($code === '' && $units === '')
            Showing all subjects.
        @else
            Showing subjects
            @if ($code !== '') with code <strong>{{ $code }}</strong> @endif
            @if ($code !== '' && $units !== '') and @endif
            @if ($units !== '') with <strong>{{ $units }}</strong> units @endif
            .
        @endif
    </p>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Units</th>
        </tr>

        @forelse ($subjects as $subj)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subj['id'] }}</td>
            <td>
                <a href="{{ route('subjects.show', $subj['id']) }}">
                    {{ $subj['code'] }}
                </a>
            </td>
            <td>{{ $subj['title'] }}</td>
            <td>
                @if ($subj['units'] >= 3)
                    <strong>{{ $subj['units'] }} (Heavy Load)</strong>
                @else
                    {{ $subj['units'] }}
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No subjects have been added yet. Check back once some are added.</td>
        </tr>
        @endforelse
    </table>
@endsection