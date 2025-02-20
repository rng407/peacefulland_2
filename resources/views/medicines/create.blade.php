@extends('layouts.dashboard')

@section('title', 'Create Medicine')

@section('content')
    <h1 class="title">Create Medicine</h1>

    <form action="{{ route('medicines.store') }}" method="POST">
        @csrf
        <div class="field">
            <label class="label" for="nama">Nama Obat:</label>
            <div class="control">
                <input class="input @error('nama') is-danger @enderror" type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
            </div>
            @error('nama')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
             <label class="label" for="dosis">Dosis:</label>
            <div class="control">
                <input class="input @error('dosis') is-danger @enderror" type="number" name="dosis" id="dosis" value="{{ old('dosis') }}" required>
            </div>
        @error('dosis')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="field">
            <label class="label" for="jenis">Jenis:</label>
            <div class="control">
                <input class="input @error('jenis') is-danger @enderror" type="text" name="jenis" id="jenis" value="{{ old('jenis') }}" required>
            </div>
            @error('jenis')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="efek_samping">Efek Samping:</label>
            <div class="control">
                <input class="input @error('efek_samping') is-danger @enderror" type="text" name="efek_samping" id="efek_samping" value="{{ old('efek_samping') }}" required>
            </div>
            @error('efek_samping')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="indikasi">Indikasi:</label>
            <div class="control">
                <input class="input @error('indikasi') is-danger @enderror" type="text" name="indikasi" id="indikasi" value="{{ old('indikasi') }}" required>
            </div>
            @error('indikasi')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="kontraindikasi">Kontra indikasi:</label>
            <div class="control">
                <input class="input @error('kontraindikasi') is-danger @enderror" type="text" name="kontraindikasi" id="kontraindikasi" value="{{ old('kontraindikasi') }}" required>
            </div>
            @error('kontraindikasi')
            <p class="helo is-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Create</button>
            </div>
            <div class="control">
                <a href="{{ route('medicines.index') }}" class="button is-link is-light">Cancel</a>
            </div>
        </div>
    </form>
@endsection
