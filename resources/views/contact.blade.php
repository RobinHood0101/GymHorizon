@extends('layouts.app')

@section('title', 'Kontakt | Gymhorizon')

@section('hero')
    <header>
        <h1 style="padding: 15px;text-align: center;">Kontakt</h1>
    </header>
@endsection

@section('content')
    <s:form:contact>
        <section class="position-relative py-4 py-xl-5">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-4">
                        <div class="d-flex h-100 flex-column justify-content-center align-items-start">
                            <div class="d-flex align-items-center p-3">
                                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg class="bi bi-envelope" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"></path>
                                    </svg></div>
                                <div class="px-2">
                                    <h6 class="mb-0">Email</h6>
                                    <p class="mb-0">info@example.com</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg class="bi bi-discord" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612"></path>
                                    </svg></div>
                                <div class="px-2">
                                    <h6 class="mb-0">Discord</h6>
                                    <p class="mb-0">My Username</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <div>
                            <form class="p-3 p-xl-4" method="post">
                                <div class="mb-3"><input id="name-1" class="form-control" type="text" name="name" placeholder="Name" /></div>
                                <div class="mb-3"><input id="email-1" class="form-control" type="email" name="email" placeholder="Email" /></div>
                                <div class="mb-3"><textarea id="message-1" class="form-control" name="comment" rows="6" placeholder="Message"></textarea></div>
                                <input type="hidden" class="hidden" name="{{ isset($honeypot) ? $honeypot : 'honeypot' }}" />
                                <div><button class="btn btn-primary w-100 d-block" type="submit">Send </button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if ($success)
                <div class=" p-2" style="color: var(--bs-success);">
                    Nachricht erfolgreich erfasst.
                </div>
            @endif
        </section>
    </s:form:contact>

@endsection
