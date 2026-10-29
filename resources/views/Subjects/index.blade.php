@extends('layouts.app')

@section('title', 'My Subjects List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">My Subjects List</h1>
        <a href="{{ route('subjects.create') }}" class="btn btn-success">+ Add Subject</a>
    </div>

    {{-- <div class="mb-3">
        <strong>Filter by code:</strong>
        @foreach (array_unique(array_column($allSubjects, 'code')) as $c)
            <a href="{{ route('subjects.index', ['code' => $c, 'units' => $units, 'prerequisite_id' => $prerequisiteId]) }}"
               class="btn btn-sm {{ $code === $c ? 'btn-primary' : 'btn-outline-primary' }}">{{ $c }}</a>
        @endforeach
    </div> --}}

    {{-- <div class="mb-3">
        <strong>Filter by units:</strong>
        @foreach (array_unique(array_column($allSubjects, 'units')) as $u)
            <a href="{{ route('subjects.index', ['code' => $code, 'units' => $u, 'prerequisite_id' => $prerequisiteId]) }}"
               class="btn btn-sm {{ (string) $units === (string) $u ? 'btn-primary' : 'btn-outline-primary' }}">{{ $u }} units</a>
        @endforeach
    </div> --}}

    {{-- <div class="mb-3">
        <strong>Filter by prerequisite:</strong>
        @foreach ($prerequisites as $p)
            <a href="{{ route('subjects.index', ['code' => $code, 'units' => $units, 'prerequisite_id' => $p->id]) }}"
               class="btn btn-sm {{ (string) $prerequisiteId === (string) $p->id ? 'btn-primary' : 'btn-outline-primary' }}">{{ $p->name }}</a>
        @endforeach
    </div> --}}

    <p>
        <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-secondary">Clear filters</a>
    </p>

    <p>
        @if ($code === '' && $units === '' && $prerequisiteId === '')
            Showing all subjects.
        @else
            Showing subjects
            @if ($code !== '') with code <strong>{{ $code }}</strong> @endif
            @if ($units !== '') with <strong>{{ $units }}</strong> units @endif
            @if ($prerequisiteId !== '') with prerequisite <strong>{{ $prerequisites->firstWhere('id', $prerequisiteId)?->name }}</strong> @endif
        @endif
    </p>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Units</th>
            <th>Prerequisite</th>
            <th>Actions</th>
        </tr>

        @forelse ($subjects as $subj)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $subj['id'] }}</td>
            <td>
                <a href="{{ route('subjects.show', $subj['id']) }}">{{ $subj['code'] }}</a>
            </td>
            <td>{{ $subj['title'] }}</td>
            <td>
                @if ($subj['units'] >= 3)
                    <strong>{{ $subj['units'] }} (Heavy Load)</strong>
                @else
                    {{ $subj['units'] }}
                @endif
            </td>
            <td>{{ $subj->prerequisite->name }}</td>
            <td>
                <a href="{{ route('subjects.edit', $subj) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('subjects.destroy', $subj) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No subjects match. Try clearing the filters.</td>
        </tr>
        @endforelse
    </table>
@endsection