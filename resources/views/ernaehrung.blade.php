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
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h1>Ernährung</h1>
            <p class="w-lg-50">Die Ernährung ist ein wichtiger Faktor beim Muskelaufbau und Training.</p>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2">
        <div class="col">
            <div class="d-flex flex-column flex-lg-row">
                <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover"
                                        alt="ice cubes dropped in clear drinking cup with water"
                                        style="height: 200px;max-width: 100%;"
                                        src="assets/img/photo-1553353799-a992825b0d07.jpg"></div>
                <div class="py-4 py-lg-0 px-lg-4">
                    <h4>Wasser</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex flex-column flex-lg-row">
                <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover"
                                        alt="A Man Holding a Plastic Tumbler" style="height: 200px;"
                                        src="assets/img/pexels-photo-4378522.jpeg"></div>
                <div class="py-4 py-lg-0 px-lg-4">
                    <h4>Proteinshake</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex flex-column flex-lg-row">
                <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover"
                                        alt="a pile of nuts sitting on top of a wooden table" style="height: 200px;"
                                        src="assets/img/photo-1708852289999-16b330e722b9.jpg"></div>
                <div class="py-4 py-lg-0 px-lg-4">
                    <h4>Nüsse</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex flex-column flex-lg-row">
                <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" alt="meat, food, protein"
                                        style="height: 200px;"
                                        src="assets/img/g475f9c046ccd30ba7574dd03edcc75cd80be5eecfa49ab352c6e99238eae56208cbbeda7306dd5fa66f137a030eaf9e0a038b34f56a16bf0ca24d8f568c5f910_640.jpg">
                </div>
                <div class="py-4 py-lg-0 px-lg-4">
                    <h4>Fleisch</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex flex-column flex-lg-row">
                <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover" alt="thai, thaifood, asian"
                                        style="height: 200px;"
                                        src="assets/img/g98dfd236117cddaba20e6df4553061aa5e463ef90c7c5a7c959376bb5ee8b48bb1f5e4d7c46da09a7fe65f8238c68f93ff95e6bbc52a86abfe46c6f9f4453772_640.jpg">
                </div>
                <div class="py-4 py-lg-0 px-lg-4">
                    <h4>Fisch</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="d-flex flex-column flex-lg-row">
                <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover"
                                        alt="a group of eggs in a carton of hay" style="height: 200px;"
                                        src="assets/img/photo-1683131076460-3f574d04c062.jpg"></div>
                <div class="py-4 py-lg-0 px-lg-4">
                    <h4>Andere Lebensmittel</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                </div>
            </div>
        </div>
    </div>
</div>

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
