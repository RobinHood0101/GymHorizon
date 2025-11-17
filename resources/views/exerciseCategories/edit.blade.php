@extends('layouts.app')

@section('title', 'Übungskategorie bearbeiten | Gymhorizon')

@push('styles')
    <style>
        main {
            padding: 50px 15px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        header h1 {
            font-size: 2rem;
            margin-top: 30px;
        }
    </style>
@endpush

@section('hero')
    <header class="text-center">
        <h1>Übungskategorie bearbeiten</h1>
    </header>
@endsection

@section('content')
    <div class="form-container">
        <form action="{{ route('exercise-categories.update', $exerciseCategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" for="name">Name der Kategorie</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $exerciseCategory->name) }}" autofocus>
                @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-group mt-3">
                <button type="submit" class="btn btn-primary">Speichern</button>
                <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Zurück</a>
            </div>
        </form>
    </div>
@endsection
