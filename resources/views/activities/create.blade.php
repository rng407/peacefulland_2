@extends('layouts.dashboard')

@section('title', 'Create Activity')

@section('content')
    <h1 class="title">Create Activity</h1>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        <div class="field">
            <label class="label">Name:</label>
            <div class="control">
                <input class="input @error('nama') is-danger @enderror" type="text" name="nama" value="{{ old('nama') }}" required>
            </div>
            @error('nama')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Description (Optional):</label>
            <div class="control">
                <textarea class="textarea @error('deskripsi') is-danger @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>
            @error('deskripsi')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Duration (minutes):</label>
            <div class="control">
                <input class="input @error('durasi') is-danger @enderror" type="number" name="durasi" value="{{ old('durasi') }}">
            </div>
            @error('durasi')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>



        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-link">Create</button>
            </div>
            <div class="control">
                <a href="{{ route('activities.index') }}" class="button is-link is-light">Cancel</a>
            </div>
        </div>
    </form>
@endsection
