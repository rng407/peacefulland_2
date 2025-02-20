@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <h1 class="title">Dashboard</h1>
    <p class="subtitle">
        Selamat datang di dashboard aplikasi Anda.
    </p>

    {{-- Contoh konten lain --}}
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Statistik 1</p>
                <p class="subtitle">Data penting...</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Statistik 2</p>
                <p class="subtitle">Informasi lainnya...</p>
            </article>
        </div>
    </div>

@endsection
