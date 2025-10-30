@php
    use App\Models\Exercise;
    use App\Models\ExerciseCategory;

    $exercises = Exercise::all();
    $exerciseCategories = ExerciseCategory::all();
@endphp
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Übungen | Gymhorizon</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/NAV-1.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
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
</head>

<body>
<x-header></x-header>
<header class="text-center my-4">
    <h1>Übungen</h1>
</header>
<main class="container">
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

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>Übung</th>
                            <th>Bemerkung</th>
                            <th>Raum</th>
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
                                        <!-- Bearbeiten -->
                                        <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-warning" title="Bearbeiten">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <!-- Löschen -->
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

                <a href="{{ route('exercises.create') }}?category={{ $exerciseCategory->id }}"
                   class="btn btn-primary mt-3">
                    Neue Übung zu {{ $exerciseCategory->name }} hinzufügen
                </a>
            </div>
        </div>
    @endforeach
</main>

<x-footer></x-footer>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/Bootstrap-DataTables-main.js"></script>
<script src="assets/js/Advanced-NavBar---Multi-dropdown-main.js"></script>
<script src="assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
</body>

</html>
