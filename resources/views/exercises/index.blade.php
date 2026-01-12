@extends('layouts.app')

@section('title', 'Übungen | Gymhorizon')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        main {
            padding: 2rem 1rem;
        }

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
        <button
                type="button"
                class="btn btn-primary btn-lg"
                data-bs-toggle="modal"
                data-bs-target="#exampleModalCenter">
            Neue Kategorie erstellen
        </button>
        <livewire:create-exercise-category />
    </div>
    <livewire:list-exercise-category />
@endsection
