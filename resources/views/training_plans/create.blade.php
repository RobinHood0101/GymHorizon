<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Trainingsplan | Gymhorizon</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="/assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/NAV-1.css">
    <link rel="stylesheet" href="/assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="/assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="/assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        const exerciseCategories = @json($exerciseCategories, JSON_THROW_ON_ERROR);
    </script>
</head>

<body>
<x-header></x-header>
<header class="bg-primary text-white text-center py-4 mb-4 shadow-sm">
    <h1 class="mb-0">Trainingsplan erstellen</h1>
</header>

<main class="container d-flex justify-content-center align-items-start" style="min-height: 80vh;">
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

        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button id="add-exercise-btn" type="button" class="btn btn-outline-success">
                <i class="bi bi-plus-circle"></i> Übung hinzufügen
            </button>
            <button type="submit" class="btn btn-primary">Plan erstellen</button>
        </div>

        <div class="mt-3">
            <a href="{{ route('training-plans.index') }}" class="btn btn-secondary w-100">Zurück</a>
        </div>
    </form>
</main>

<x-footer></x-footer>

<script src="/assets/js/script.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/bs-init.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/Bootstrap-DataTables-main.js"></script>
<script src="/assets/js/Advanced-NavBar---Multi-dropdown-main.js"></script>
<script src="/assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
</body>

</html>
