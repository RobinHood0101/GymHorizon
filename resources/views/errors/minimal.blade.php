<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="/assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/NAV-1.css">
    <link rel="stylesheet" href="/assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="/assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="/assets/css/Video-Parallax-Background-v2-multiple-parallax.css">

    <title>@yield('title')</title>

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<section class="d-flex py-4 py-xl-5">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center mx-auto">
                <div>
                    <h2 class="text-uppercase fw-bold mb-3">@yield('message') @yield('code')</h2>
                    <p class="mb-4">Diese Seite wurde nicht gefunden. Es kann sein, dass sie verschoben wurde oder nicht
                        existiert.</p><a href="{{ route('home') }}">
                        <button class="btn btn-primary fs-5 me-2 px-4 py-2" type="button">Zurück zur Startseite</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<h1>
</h1>

<div>

</div>

<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/bs-init.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/Bootstrap-DataTables-main.js"></script>
<script src="/assets/js/Advanced-NavBar---Multi-dropdown-main.js"></script>
<script src="/assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
</body>
</html>
