<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GymHorizon</title>
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
    <h1 style="padding: 15px;text-align: center;">Trainingspläne</h1>
</header>
<main style="padding: 70px;">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Tag</th>
                <th>Muskeln</th>
                <th>Dauer</th>
                <th>Notizen</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Montag</td>
                <td></td>
                <td>1h 30min</td>
                <td>Badminton</td>
            </tr>
            <tr>
                <td>Dienstag</td>
                <td>PUSH</td>
                <td>1h 30min</td>
                <td></td>
            </tr>
            <tr>
                <td>Mittwoch</td>
                <td>PULL</td>
                <td>1h 30min</td>
                <td></td>
            </tr>
            <tr>
                <td>Donnerstag</td>
                <td></td>
                <td>1h 30min</td>
                <td>Badminton</td>
            </tr>
            <tr>
                <td>Freitag</td>
                <td>LEG</td>
                <td>1h 30min</td>
                <td></td>
            </tr>
            <tr>
                <td>Samstag</td>
                <td>PUSH</td>
                <td>1h 30min</td>
                <td></td>
            </tr>
            <tr>
                <td>Sonntag</td>
                <td>PULL</td>
                <td>1h 30min</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
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
