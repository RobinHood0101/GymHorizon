@extends('layouts.app')

@section('title', 'Übungen | Gymhorizon')

@push('styles')
    <style>
        .category-card {
            margin-bottom: 2rem;
        }

        .table th {
            background-color: var(--bs-table-light-bg);
        }
    </style>
@endpush

@section('hero')
    <header class="text-center my-4">
        <h1>Übungen</h1>
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
        <a href="{{ route('exercise-categories.create') }}" class="btn btn-primary btn-lg">
            Neue Kategorie erstellen
        </a>
    </div>
    @if($exerciseCategories->isEmpty())
        <div class="alert alert-info" role="alert">
            Noch keine Kategorien vorhanden.
        </div>
    @endif
    @foreach($exerciseCategories as $exerciseCategory)
        <div class="card category-card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h2 class="card-title">{{ $exerciseCategory->name }}</h2>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('exercise-categories.edit', $exerciseCategory->id) }}"
                           class="btn btn-warning btn-sm">Bearbeiten</a>
                        <form action="{{ route('exercise-categories.destroy', $exerciseCategory->id) }}" method="POST"
                              class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Löschen</button>
                        </form>
                    </div>
                </div>
                @if($exerciseCategory->exercises->isEmpty())
                    <p class="text-muted fst-italic">Noch keine Übungen in dieser Kategorie vorhanden.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                            <tr>
                                <th>Übung</th>
                                <th>Bemerkung</th>
                                <th>Ort</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exerciseCategory->exercises as $exercise)
                                <tr>
                                    <td>{{ $exercise->name }}</td>
                                    <td>{{ $exercise->description }}</td>
                                    <td>{{ $exercise->place }}</td>
                                    <td class="text-center" style="width: 120px;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- edit -->
                                            <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-warning" title="Bearbeiten">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <!-- delete -->
                                            <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" onsubmit="return confirm('Diese Übung wirklich löschen?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Löschen">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <a href="{{ route('exercises.create') }}?category={{ $exerciseCategory->id }}"
                   class="btn btn-primary mt-3">
                    Neue Übung zu {{ $exerciseCategory->name }} hinzufügen
                </a>
            </div>
        </div>
    @endforeach
@endsection
