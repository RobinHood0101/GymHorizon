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
    <style>
        main {
            padding: 2rem 1rem;
        }
        section {
            margin-top: 40px;
        }
        .alert {
            margin-top: 20px;
        }
        .plan-card {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
<x-header></x-header>
<header class="text-center my-4">
    <h1>Trainingsplan</h1>
</header>
<main class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Schließen"></button>
        </div>
    @endif
    <div class="mb-4 text-center">
        <a href="{{ route('training-plans.create') }}" class="btn btn-primary btn-lg">
            Neuen Trainingsplan erstellen
        </a>
    </div>
    @if($plans->isEmpty())
        <div class="alert alert-info" role="alert">
            Noch keine Trainingspläne vorhanden.
        </div>
    @endif
    @foreach($plans as $plan)
        <div class="card plan-card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h2 class="card-title">{{ $plan->name }}</h2>
                        <p class="mb-1"><strong>Dauer:</strong> {{ $plan->duration }}</p>
                        <p class="mb-0"><strong>Beschreibung:</strong> {{ $plan->notes }}</p>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('training-plans.edit', $plan->id) }}"
                           class="btn btn-warning btn-sm">Bearbeiten</a>
                        <form action="{{ route('training-plans.destroy', $plan->id) }}" method="POST" class="m-0">
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
                            <th>Gewicht</th>
                            <th>Wiederholungen</th>
                            <th>Sätze</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plan->exercises as $exercise)
                            <tr>
                                <td>{{ $exercise->name }}</td>
                                <td>{{ $exercise->description }}</td>
                                <td>{{ $exercise->pivot->weight }}</td>
                                <td>{{ $exercise->pivot->repetitions }}</td>
                                <td>{{ $exercise->pivot->sets }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
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
