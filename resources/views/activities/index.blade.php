@extends('layouts.dashboard')  {{-- Gunakan layout dashboard --}}

@section('title', 'Activities')

@section('content')

    <div class="mb-6">
        <h1 class="title">Activities</h1>
        <a href="{{ route('activities.create') }}" class="button is-primary">Create Activity</a>
    </div>
    @if(session('success'))
        <div class="notification is-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table is-striped is-fullwidth">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Duration (menit)</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($activities as $activity)
            <tr>
                <td>{{ $activity->nama }}</td>
                <td>{{ $activity->deskripsi ?? '-' }}</td>
                <td>{{ $activity->durasi ?? '-' }}</td>
                <td>
                    <div class="buttons">
                        <a href="{{ route('activities.edit', $activity) }}" class="button is-warning is-small">
                                 <span class="icon">
                                    <i class="fas fa-edit"></i>
                                 </span>
                        </a>
                        <form action="{{ route('activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
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
                <td colspan="6" class="has-text-centered">No activities found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
