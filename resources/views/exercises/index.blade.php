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
                data-bs-target="#createModalCenter">
            Neue Kategorie erstellen
        </button>
        <div class="modal fade" id="createModalCenter" tabindex="-1"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Kategorie erstellen
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <livewire:exercise-category-form
                                submitAction="create"
                                buttonText="Erstellen"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:list-exercise-category />
@endsection
