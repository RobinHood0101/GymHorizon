@extends('layouts.app')

@section('title', 'Trainingsplan erstellen | Gymhorizon')

@push('scripts-head')
    {{-- AlpineJS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const exerciseCategories = @json($exerciseCategories, JSON_THROW_ON_ERROR);
    </script>
@endpush

@section('hero')
    <header class="bg-primary text-white text-center py-4 mb-4 shadow-sm">
        <h1 class="mb-0">Trainingsplan erstellen</h1>
    </header>
@endsection

@section('content')
    <main class="container d-flex justify-content-center align-items-start" x-data="{
    // Neue Uebungen in Object speichern und dann über dieses Object einen Loop machen und html ausgeben
    exerciseCount: 2,
    exercises: [
        {
            id: 1,
            exercise_id: 0,
            weight: 0,
            repetitions: 0,
            sets: 0
        }
    ],
    addNewExercise() {
        this.exercises.push(
            {
                id: this.exerciseCount+1,
                exercise_id: 0,
                weight: 0,
                repetitions: 0,
                sets: 0
            }
        );
        this.exerciseCount++;
        console.log(this.exercises);
    },
    removeExercise(id) {
        this.exercises = this.exercises.filter(ex => ex.id !== id);
        console.log('delete:' + id);
    },
    isAlreadySelected(exerciseId) {
        for (const exercise of this.exercises) {
            if (exerciseId == exercise.exercise_id) {
                return true;
            }
        }
        return false;
    }
}
">
        <form class="w-100 p-4 bg-white rounded shadow-sm" style="max-width: 750px;"
              action="{{ route('training-plans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" required autofocus>
                @error('plan_name')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="duration">Dauer (Minuten)</label>
                <input class="form-control" type="number" id="duration" name="duration">
                @error('duration')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="notes">Beschreibung</label>
                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                @error('notes')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <h2 class="h4 mt-4 mb-3 border-bottom pb-2">Übungen</h2>

            <div id="exercise-container" class="mb-4">
                <template x-for="(exercise, index) in exercises" :key="exercise.id">
                    <div class="exercise-card">
                        <h5 class="fw-semibold mb-3">Übung <span x-text="index+1"></span></h5>
                        <div class="exercise-entry row g-3 align-items-end p-3 border rounded-3 bg-light shadow-sm">

                            <div class="col-lg-3 col-md-4">
                                <label class="form-label mb-1">Übung</label>
                                <select class="form-select exercise-select" name="exercises[]" style="width: 100%;" x-model="exercise.exercise_id">
                                    <option selected>Wähle...</option>
                                    <template x-for="exerciseCategory in exerciseCategories">
                                        <optgroup :label="exerciseCategory.name">
                                            <template x-for="exerciseSelect in exerciseCategory.exercises">
                                                <template x-if="!isAlreadySelected(exerciseSelect.id) || exercise.exercise_id == exerciseSelect.id">
                                                    <option :value="exerciseSelect.id"><span x-text="exerciseSelect.name"></span></option>
                                                </template>
                                            </template>
                                        </optgroup>
                                    </template>
                                </select>
                            </div>

                            <div class="col-lg-2 col-md-4">
                                <label class="form-label mb-1">Gewicht (kg)</label>
                                <input type="number" class="form-control" name="weights[]">
                            </div>

                            <div class="col-lg-2 col-md-4">
                                <label class="form-label mb-1">Wdh.</label>
                                <input type="number" class="form-control" name="reps[]">
                            </div>

                            <div class="col-lg-2 col-md-4">
                                <label class="form-label mb-1">Sätze</label>
                                <input type="number" class="form-control" name="sets[]">
                            </div>

                            <div class="col-lg-3 col-md-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-danger w-100 remove-exercise-btn"
                                        x-on:click="removeExercise(exercise.id)">
                                    <i class="bi bi-trash me-1"></i> Entfernen
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button id="add-exercise-btn" type="button" class="btn btn-outline-success" x-on:click="addNewExercise()">
                    <i class="bi bi-plus-circle"></i> Übung hinzufügen
                </button>
                <button type="submit" class="btn btn-primary">Plan erstellen</button>
            </div>

            <div class="mt-3">
                <a wire:navigate href="{{ route('training-plans.index') }}" class="btn btn-secondary w-100">Zurück</a>
            </div>
        </form>
    </main>
@endsection
