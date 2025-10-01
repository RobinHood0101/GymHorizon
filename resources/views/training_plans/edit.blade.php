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
        form div {
            margin-top: 15px;
        }
    </style>
</head>

<body>
<x-header></x-header>
<header>
    <h1 style="padding: 15px;text-align: center;">Trainingsplan bearbeiten</h1>
</header>
<main style="padding: 70px;">
    <form style="max-width: 600px;" action="{{ route('trainingsplan.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="plan_name">Name</label>
            <input class="form-control" type="text" id="plan_name" name="plan_name" value="{{$plan->plan_name}}" required />
            @error('plan_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="duration">Dauer in Minuten</label>
            <input class="form-control" type="text" id="duration" name="duration" value="{{$plan->duration}}" />
            @error('duration')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="notes">Beschreibung</label>
            <input class="form-control" type="text" id="notes" name="notes" value="{{$plan->notes}}" />
            @error('notes')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="exercises">Übungen auswählen</label>
            <select class="form-select" id="exercises" name="exercises[]" multiple>
                @foreach($exercises as $exercise)
                    <option value="{{ $exercise->id }}"
                            {{ $plan->exercises->contains($exercise->id) ? 'selected' : '' }}>
                        {{ $exercise->exercise_name }}
                    </option>
                @endforeach
            </select>
            @error('exercises[]')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary mt-3">Plan speichern</button>
    </form>
    <a href="{{ route('trainingsplan.index') }}" class="btn btn-secondary mt-3">Zurück</a>
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
