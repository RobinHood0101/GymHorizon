@php use App\Models\Plan; @endphp
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Wochenplan | Gymhorizon</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="/assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/NAV-1.css">
    <link rel="stylesheet" href="/assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="/assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="/assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
</head>

<body>
<x-header></x-header>
<header>
    <h1 style="padding: 15px;text-align: center;">Wochenplan erstellen</h1>
</header>
<main style="padding: 70px;">
    <form action="{{ route('wochenplan.store') }}" method="POST">
        @csrf

        <label class="form-label" for="title">Titel</label>
        <input class="form-control" type="text" name="title" id="title"/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Trainingsplan</th>
                    <th>Notizen</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $days = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'];
                    $trainingPlans = Plan::all();
                @endphp
                @foreach($days as $index => $day)
                    <tr>
                        <td>{{ $day }}</td>
                        <td>
                            <select class="form-select" name="days[{{ $index }}][plan_id]">
                                <optgroup label="Wähle einen Trainingsplan">
                                    <option value="Rest" selected>Rest Day</option>
                                    @foreach($trainingPlans as $trainingPlan)
                                        <option value="{{$trainingPlan->id}}">{{ $trainingPlan->plan_name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="days[{{ $index }}][notes]">
                            <input type="hidden" name="days[{{ $index }}][day]" value="{{ $day }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <input class="btn btn-primary" type="submit" value="Erstellen"/>
        @error('plan_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </form>
    <a href="{{ route('wochenplan.index') }}" class="btn btn-secondary mt-3">Zurück</a>
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
