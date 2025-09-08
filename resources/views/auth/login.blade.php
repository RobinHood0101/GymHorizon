<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GymHorizon</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Advanced-NavBar---Multi-dropdown.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/NAV-1.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid-Horizontal-images.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-v2-multiple-parallax.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark py-3" data-bs-theme="dark">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                        <path d="M20.2739 9.86883L16.8325 4.95392L18.4708 3.80676L21.9122 8.72167L20.2739 9.86883Z" fill="currentColor"></path>
                        <path d="M18.3901 12.4086L16.6694 9.95121L8.47783 15.687L10.1985 18.1444L8.56023 19.2916L3.97162 12.7383L5.60992 11.5912L7.33068 14.0487L15.5222 8.31291L13.8015 5.8554L15.4398 4.70825L20.0284 11.2615L18.3901 12.4086Z" fill="currentColor"></path>
                        <path d="M20.7651 7.08331L22.4034 5.93616L21.2562 4.29785L19.6179 5.445L20.7651 7.08331Z" fill="currentColor"></path>
                        <path d="M7.16753 19.046L3.72607 14.131L2.08777 15.2782L5.52923 20.1931L7.16753 19.046Z" fill="currentColor"></path>
                        <path d="M4.38208 18.5549L2.74377 19.702L1.59662 18.0637L3.23492 16.9166L4.38208 18.5549Z" fill="currentColor"></path>
                    </svg></span><span>GymHorizon</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="uebungen" style="color: var(--bs-navbar-color);">Übungen</a></li>
                    <li class="nav-item"><a class="nav-link" href="tipps" style="color: var(--bs-navbar-color);">Tipps</a></li>
                    <li class="nav-item"><a class="nav-link" href="ernaehrung">Ernährung</a></li>
                    <li class="nav-item"><a class="nav-link" href="plan" style="color: var(--bs-navbar-color);">Gym Pläne</a></li>
                    <li class="nav-item"><a class="nav-link" href="anatomie">Anatomie</a></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="register">Registrieren</a><a class="btn btn-primary ms-md-2" role="button" href="login">Einloggen</a>
            </div>
        </div>
    </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Einloggen</h2>
                    <p class="w-lg-50">Melden Sie sich mit ihrem Konto an!</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"></path>
                                </svg></div>
                            <form class="text-center" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Passwort"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                                <p class="text-muted"><a href="{{ route('password.email') }}">Passwort vergessen?</a></p>
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/Bootstrap-DataTables-main.js"></script>
    <script src="assets/js/Advanced-NavBar---Multi-dropdown-main.js"></script>
    <script src="assets/js/Video-Parallax-Background-v2-multiple-parallax.js"></script>
</body>

</html>
