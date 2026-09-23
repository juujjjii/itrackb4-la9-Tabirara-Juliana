@extends('layouts.app')

@section('title', 'Subject Filter')

@section('content')
    <h1>Subject Filter</h1>
    <p><strong>{{ $message }}</strong></p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Title</th>
                <th>Units</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($subjects as $subj)
            <tr>
                <td>{{ $subj['id'] }}</td>
                <td>
                    <a href="{{ route('subjects.show', $subj['id']) }}">
                        {{ $subj['code'] }}
                    </a>
                </td>
                <td>{{ $subj['title'] }}</td>
                <td>{{ $subj['units'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">← Back to Subject List</a>
@endsection