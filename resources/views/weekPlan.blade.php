@php

$weekplans = Auth::user()->weekplans;
@endphp
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Wochenplan | Gymhorizon</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/NAV-1.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
</head>

<body>
@include('components/header')
<header>
    <h1 style="padding: 15px;text-align: center;">Wochenplan</h1>
</header>
<main style="padding: 70px;">
    @if($weekplans->isEmpty())
        Noch keine Wochenpläne
    @endif
    @foreach($weekplans as $weekplan)
        <h2>{{ $weekplan->title }}</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Trainingsplan</th>
                    <th>Dauer</th>
                    <th>Notizen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($weekplan->dayPlans as $dayPlan)
                    <tr>
                        <td>{{ $dayPlan->day }}</td>
                        <td>{{ $dayPlan->plan->plan_name }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
