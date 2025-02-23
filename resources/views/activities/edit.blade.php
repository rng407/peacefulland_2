@extends('layouts.dashboard')

@section('title', 'Edit Activity')

@section('content')
    <h1 class="title">Edit Activity</h1>

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input @error('nama') is-danger @enderror" type="text" name="nama" value="{{ old('nama', $activity->nama) }}" required>
            </div>
            @error('nama')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea class="textarea @error('deskripsi') is-danger @enderror" name="deskripsi">{{ old('deskripsi', $activity->deskripsi) }}</textarea>
            </div>
            @error('deskripsi')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label">Duration (minutes)</label>
            <div class="control">
                <input class="input @error('durasi') is-danger @enderror" type="number" name="durasi"  value="{{ old('durasi', $activity->durasi) }}">

            </div>
            @error('durasi')
            <p class="help is-danger">{{ $message}}</p>
            @enderror
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-link">Update</button>
            </div>
            <div class="control">
                <a href="{{route('activities.index')}}" class="button is-light">Cancel</a>
            </div>
        </div>
    </form>
@endsection
