<!DOCTYPE html>
<html data-bs-theme="light" lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Übungskategorie bearbeiten | Gymhorizon</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="/assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/NAV-1.css">
    <link rel="stylesheet" href="/assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="/assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="/assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
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
</head>

<body>
<x-header></x-header>

<header class="text-center">
    <h1>Übungskategorie bearbeiten</h1>
</header>

<main>
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
                <a href="{{ route('uebungen.index') }}" class="btn btn-secondary">Zurück</a>
            </div>
        </form>
    </div>
</main>

<x-footer></x-footer>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/bs-init.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/Bootstrap-DataTables-main.js"></script>
<script src="/assets/js/Advanced-NavBar---Multi-dropdown-main.js"></script>
<script src="/assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
</body>

</html>
