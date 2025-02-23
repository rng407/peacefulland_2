@extends('layouts.dashboard')

@section('title', 'Edit Medicine')

@section('content')

    <h1 class="title">Edit Medicine</h1>

    <form action="{{ route('medicines.update', $medicine) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label" for="nama">Nama Obat:</label>
            <div class="control">
                <input class="input @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama', $medicine->nama) }}">
            </div>
            @error('nama')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="dosis">Dosis obat:</label>
            <div class="control">
                <input class="input @error('dosis') is-invalid @enderror" type="number" name="dosis" id="dosis" value="{{ old('dosis', $medicine->dosis) }}">
            </div>
            @error('dosis')
            <p class="help is-danger">{{$message}}</p>
            @enderror
        </div>


        <div class="field">
            <label class="label" for="efek_samping">efek_samping:</label>
            <div class="control">
                <input class="input @error('efek_samping') is-invalid @enderror" type="text" name="efek_samping" id="efek_samping" value="{{ old('efek_samping', $medicine->efek_samping) }}">
            </div>
            @error('efek_samping')
            <p class="help is-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="field">
            <label class="label" for="indikasi">indikasi:</label>
            <div class="control">
                <input class="input @error('indikasi') is-invalid @enderror" type="text" name="indikasi" id="indikasi" value="{{ old('indikasi', $medicine->indikasi) }}">
            </div>
            @error('indikasi')
            <p class="help is-danger">{{$message}}</p>
            @enderror
        </div>



        <div class="field">
            <label class="label" for="kontraindikasi">Jkontraindikasi:</label>
            <div class="control">
                <input class="input @error('kontraindikasi') is-invalid @enderror" type="text" name="kontraindikasi" id="kontraindikasi" value="{{ old('kontraindikasi', $medicine->kontraindikasi) }}">
            </div>
            @error('kontraindikasi')
            <p class="help is-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-link">Update</button>
            </div>
            <div class="control">
                <a href="{{ route('medicines.index') }}" class="button is-light">Cancel</a>
            </div>
        </div>

    </form>

@endsection
