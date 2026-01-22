@extends('layouts.app')

@section('title', 'Wochenplan | Gymhorizon')

@push('styles')
    <style>
        main {
            padding: 2rem 1rem;
        }

        .weekplan-card {
            margin-bottom: 2rem;
        }
    </style>
@endpush

@section('hero')
    <header class="text-center my-4">
        <h1>Wochenplan</h1>
    </header>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
        </div>
    @endif
    <div class="mb-4 text-center">
        <a wire:navigate href="{{ route('week-plans.create') }}" class="btn btn-primary btn-lg">
            Neuen Wochenplan erstellen
        </a>
    </div>
    @if($weekPlans->isEmpty())
        <div class="alert alert-info" role="alert">
            Noch keine Wochenpläne vorhanden.
        </div>
    @endif
    @foreach($weekPlans as $weekplan)
        <div class="card weekplan-card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h2 class="card-title">{{ $weekplan->title }}</h2>
                    <div class="d-flex flex-column gap-2">
                        <a wire:navigate href="{{ route('week-plans.edit', $weekplan->id) }}" class="btn btn-warning btn-sm">Bearbeiten</a>
                        <form action="{{ route('week-plans.destroy', $weekplan->id) }}" method="POST" onsubmit="return confirm('Dieser Wochenplan wirklich löschen?')" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Löschen</button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>Tag</th>
                            <th>Trainingsplan</th>
                            <th>Notizen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($weekplan->dayPlans as $dayPlan)
                            <tr>
                                <td>{{ $dayPlan->day }}</td>
                                <td>{{ $dayPlan->trainingPlan->name ?? 'Rest Day' }}</td>
                                <td>{{ $dayPlan->notes }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection
