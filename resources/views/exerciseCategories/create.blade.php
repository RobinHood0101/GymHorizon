@extends('layouts.app')

@section('title', 'Übungskategorie erstellen | Gymhorizon')

@push('styles')
    <style>
        main {
            padding: 30px 15px 50px 15px;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto 0 auto;
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
            text-align: center;
            margin-top: 30px;
        }
    </style>
@endpush

@section('hero')
    <header>
        <h1>Übungskategorie erstellen</h1>
    </header>
@endsection

@section('content')
    <div class="form-container">
        <form action="{{ route('exercise-categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Name der Kategorie</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" autofocus>
                @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-group mt-3">
                <button type="submit" class="btn btn-primary">Erstellen</button>
                <a href="{{ route('exercises.index') }}" class="btn btn-secondary">Zurück</a>
            </div>
        </form>
    </div>

@endsection
