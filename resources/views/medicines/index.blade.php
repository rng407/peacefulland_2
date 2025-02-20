@extends('layouts.dashboard')

@section('title', 'Medicines')

@section('content')

    <div class="mb-6">
        <h1 class="title">Medicines</h1>
        <a href=" {{route('medicines.create')}}" class="button is-primary">Create Medicine</a>
    </div>
    @if(session('success'))
        <div class="notification is-success">
            {{session('success')}}
        </div>
    @endif
    <table class="table is-striped is-fullwidth">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Dosis</th>
                <th>Jenis</th>
                <th>efek Samping</th>
                <th>indikasi</th>
                <th>Kontra indikasi</th>
        </thead>
        <tbody>
        @forelse($medicines as $medicine)
            <tr>
                <td>{{$medicine->nama}}</td>
                <td>{{$medicine->dosis ?? '-'}}</td>
                <td>{{$medicine->jenis  ?? '-'}}</td>
                <td>{{$medicine->efek_samping  ?? '-'}}</td>
                <td>{{$medicine->indikasi  ?? '-'}}</td>
                <td>{{$medicine->kontraindikasi  ?? '-'}}</td>
                <td>
                    <div class="buttons">
                        <a href="{{route('medicines.edit', $medicine)}}" class="button is-warning is-small">
                        <span class="icon">
                            <i class="fas fa-edit"></i>
                        </span>
                        </a>
                        <form action="{{route('medicines.destroy', $medicine)}}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button is-danger is-small">
                                <span class="icon">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="6" class="has-text-centered">No Medicines found</td>

        </tr>
        @endforelse
        </tbody>
    </table>
    @endsection

