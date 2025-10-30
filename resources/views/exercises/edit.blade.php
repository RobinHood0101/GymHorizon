<!DOCTYPE html>
<html data-bs-theme="light" lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Übung bearbeiten | Gymhorizon</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="/assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/NAV-1.css">
    <link rel="stylesheet" href="/assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="/assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="/assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
</head>

<body>
<x-header></x-header>

<header>
    <h1 style="padding: 15px; text-align: center;">
        Übung bearbeiten – {{ $exercise->name }}
    </h1>
</header>

<main style="padding: 70px;">
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

    <a href="{{ route('exercises.index') }}" class="btn btn-secondary mt-3">Zurück</a>
</main>

<x-footer></x-footer>

<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/bs-init.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/Bootstrap-DataTables-main.js"></script>
<script src="/assets/js/Advanced-NavBar---Multi-dropdown-main.js"></script>
<script src="/assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
</body>

</html>
