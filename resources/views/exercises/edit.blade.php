@extends('layouts.app')

@section('title', 'Übung bearbeiten | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px; text-align: center;">
            Übung bearbeiten – {{ $exercise->name }}
        </h1>
    </header>
@endsection

@section('content')
    <form action="{{ route('exercises.update', $exercise) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="form-label" for="name">Name</label>
        <input
                class="form-control"
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $exercise->name) }}"
                required
                autofocus
        />

        <label class="form-label mt-3" for="description">Beschreibung</label>
        <input
                class="form-control"
                type="text"
                name="description"
                id="description"
                value="{{ old('description', $exercise->description) }}"
        />

        <label class="form-label mt-3" for="place">Ort</label>
        <input
                class="form-control"
                type="text"
                name="place"
                id="place"
                value="{{ old('place', $exercise->place) }}"
        />

        <input type="hidden" name="category_id" value="{{ $exercise->exercise_category_id }}"/>

        <input class="btn btn-primary mt-4" type="submit" value="Speichern"/>

        @if ($errors->any())
            <div class="mt-3 text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

    <a wire:navigate href="{{ route('exercises.index') }}" class="btn btn-secondary mt-3">Zurück</a>
@endsection
