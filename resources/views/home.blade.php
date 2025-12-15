@extends('layouts.app')

@section('title', 'GymHorizon')

@section('hero')
    @if($first_login ?? false)
            <x-guide></x-guide>
    @endif
    <section>
        <div data-bss-parallax-bg="true" style="height: 600px;background: url('{{ asset('assets/img/gym.jpg') }}');">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div style="max-width: 350px;">
                            <h1 class="text-uppercase fw-bold" style="color: var(--bs-body-bg);">
                                @guest
                                    ERFÜLLE DEINE TRÄUME!
                                @endguest
                                @auth
                                    Willkommen {{ Auth::user()->name }}!
                                @endauth
                            </h1>
                            <p class="my-3" style="color: var(--bs-body-bg);">Alles rund ums Thema Fitness und Gym</p>
                            @guest
                                <a class="btn btn-primary btn-lg me-2" role="button" href="{{ route('register') }}">Starte
                                    jetzt</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container py-4 py-xl-5">
        <div class="row">
            <div class="col-md-8 col-xl-6 mx-auto p-4">
                <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" class="icon icon-tabler icon-tabler-gymnastics">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 7a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                            <path d="M13 21l1 -9l7 -6"></path>
                            <path d="M3 11h6l5 1"></path>
                            <path d="M11.5 8.5l4.5 -3.5"></path>
                        </svg>
                    </div>
                    <div>
                        <h4>Übungen</h4>
                        <p>Erstelle neue Übungen</p><a href="{{ route('exercises.index') }}">Mehr erfahren&nbsp;<svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr class="my-5">
                <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center order-last ms-4 d-inline-block bs-icon xl">
                        <i class="icon ion-information"></i></div>
                    <div>
                        <h4>Tipps</h4>
                        <p>Viele Verschiedene Fitness-Tipps</p><a href="{{ route('tips') }}">Mehr erfahren&nbsp;<svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr class="my-5">
                <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl">
                        <i class="icon ion-android-restaurant"></i></div>
                    <div>
                        <h4>Ernährung</h4>
                        <p><br>Finde heraus welche Ernährung dich zu deinen Zielen führt<br><br></p><a
                                href="{{ route('nutrition') }}">Mehr
                            erfahren&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                               fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg>
                        </a>
                    </div>
                    <hr class="my-5">
                </div>
                <hr class="my-5">
                <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center order-last ms-4 d-inline-block bs-icon xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                             fill="none">
                            <path d="M6 6C6 5.44772 6.44772 5 7 5H17C17.5523 5 18 5.44772 18 6C18 6.55228 17.5523 7 17 7H7C6.44771 7 6 6.55228 6 6Z"
                                  fill="currentColor"></path>
                            <path d="M6 10C6 9.44771 6.44772 9 7 9H17C17.5523 9 18 9.44771 18 10C18 10.5523 17.5523 11 17 11H7C6.44771 11 6 10.5523 6 10Z"
                                  fill="currentColor"></path>
                            <path d="M7 13C6.44772 13 6 13.4477 6 14C6 14.5523 6.44771 15 7 15H17C17.5523 15 18 14.5523 18 14C18 13.4477 17.5523 13 17 13H7Z"
                                  fill="currentColor"></path>
                            <path d="M6 18C6 17.4477 6.44772 17 7 17H11C11.5523 17 12 17.4477 12 18C12 18.5523 11.5523 19 11 19H7C6.44772 19 6 18.5523 6 18Z"
                                  fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M2 4C2 2.34315 3.34315 1 5 1H19C20.6569 1 22 2.34315 22 4V20C22 21.6569 20.6569 23 19 23H5C3.34315 23 2 21.6569 2 20V4ZM5 3H19C19.5523 3 20 3.44771 20 4V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V4C4 3.44772 4.44771 3 5 3Z"
                                  fill="currentColor"></path>
                        </svg>
                    </div>
                    <div>
                        <h4>Trainingspläne</h4>
                        <p>Erstelle deine eigenen Pläne</p><a href="{{ route('training-plans.index') }}">Mehr erfahren&nbsp;<svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr class="my-5">
                <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl">
                        <i class="icon ion-ios-body"></i></div>
                    <div>
                        <h4>Anatomie</h4>
                        <p>Es ist wichtig zu wissen, wie dein Körper funktioniert.</p><a href="{{ route('anatomy') }}">Mehr
                            erfahren&nbsp;<svg
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16" class="bi bi-arrow-right">
                                <path fill-rule="evenodd"
                                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg>
                        </a>
                    </div>
                    <hr class="my-5">
                </div>
            </div>
        </div>
    </div>
@endsection
