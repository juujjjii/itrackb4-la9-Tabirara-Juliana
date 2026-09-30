@extends('layouts.app')

@section('title', 'Add a Subject')

@section('content')
    <h1>Add a Subject</h1>

    <form method="POST" action="{{ route('subjects.store') }}" style="max-width: 30rem;">
        @csrf

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}"
                   class="form-control @error('code') is-invalid @enderror">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="units" class="form-label">Units</label>
            <select name="units" id="units" class="form-select @error('units') is-invalid @enderror">
                <option value="" disabled {{ old('units') ? '' : 'selected' }}>Choose units</option>
                <option value="1" @selected(old('units') == '1')>1</option>
                <option value="2" @selected(old('units') == '2')>2</option>
                <option value="3" @selected(old('units') == '3')>3</option>
            </select>
            @error('units')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Subject</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection