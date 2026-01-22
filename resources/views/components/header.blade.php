<nav class="navbar navbar-expand-md bg-dark py-3" data-bs-theme="dark">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                        <path d="M20.2739 9.86883L16.8325 4.95392L18.4708 3.80676L21.9122 8.72167L20.2739 9.86883Z" fill="currentColor"></path>
                        <path d="M18.3901 12.4086L16.6694 9.95121L8.47783 15.687L10.1985 18.1444L8.56023 19.2916L3.97162 12.7383L5.60992 11.5912L7.33068 14.0487L15.5222 8.31291L13.8015 5.8554L15.4398 4.70825L20.0284 11.2615L18.3901 12.4086Z" fill="currentColor"></path>
                        <path d="M20.7651 7.08331L22.4034 5.93616L21.2562 4.29785L19.6179 5.445L20.7651 7.08331Z" fill="currentColor"></path>
                        <path d="M7.16753 19.046L3.72607 14.131L2.08777 15.2782L5.52923 20.1931L7.16753 19.046Z" fill="currentColor"></path>
                        <path d="M4.38208 18.5549L2.74377 19.702L1.59662 18.0637L3.23492 16.9166L4.38208 18.5549Z" fill="currentColor"></path>
                    </svg></span><span>GymHorizon</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-5">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link {{ setActive(['tips', 'nutrition', 'anatomy'])}}" aria-expanded="false" data-bs-toggle="dropdown" href="#">Allgemein </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{ setActive('tips') ? 'active' : ''}}" href="{{ route('tips') }}" style="color: var(--bs-navbar-color);">Tipps</a>
                        <a class="dropdown-item {{ setActive('nutrition') ? 'active' : ''}}" href="{{ route('nutrition') }}" style="color: var(--bs-navbar-color);">Ernährung</a>
                        <a class="dropdown-item {{ setActive('anatomy') ? 'active' : ''}}" href="{{ route('anatomy') }}" style="color: var(--bs-navbar-color);">Anatomie</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link {{ setActive('exercises*') ? 'text-white' : ''}}" href="{{ route('exercises.index') }}" style="color: var(--bs-navbar-color);">Übungen</a></li>
                <li class="nav-item"><a class="nav-link {{ setActive('week-plans*') ? 'text-white' : ''}}" href="{{ route('week-plans.index') }}" style="color: var(--bs-navbar-color);">Wochenplan</a></li>
                <li class="nav-item"><a class="nav-link {{ setActive('training-plans*') ? 'text-white' : ''}}" href="{{ route('training-plans.index') }}" style="color: var(--bs-navbar-color);">Trainingsplan</a></li>
            </ul>
            @guest
                <a class="btn btn-primary ms-md-2 me-2" role="button" href="{{ route('register') }}">Registrieren</a><a class="btn btn-primary ms-md-2" role="button" href="{{ route('login') }}">Einloggen</a>
            @endguest
            @auth
{{--                <div--}}
{{--                        class="dropdown position-relative"--}}
{{--                        x-data="{ open: false }"--}}
{{--                        @click.outside="open = false"--}}
{{--                        @keydown.escape.window="open = false"--}}
{{--                >--}}
{{--                    <!-- Icon -->--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgb(255,255,255);font-size: 33px;" @click="open = !open">--}}
{{--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5C14.2091 5 16 6.79086 16 9ZM14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z" fill="currentColor"></path>--}}
{{--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 14.0902 3.71255 16.014 4.90798 17.5417C6.55245 15.3889 9.14627 14 12.0645 14C14.9448 14 17.5092 15.3531 19.1565 17.4583C20.313 15.9443 21 14.0524 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12ZM12 21C9.84977 21 7.87565 20.2459 6.32767 18.9878C7.59352 17.1812 9.69106 16 12.0645 16C14.4084 16 16.4833 17.1521 17.7538 18.9209C16.1939 20.2191 14.1881 21 12 21Z" fill="currentColor"></path>--}}
{{--                    </svg>--}}


{{--                    <!-- Dropdown -->--}}
{{--                    <div--}}
{{--                            x-show="open"--}}
{{--                            x-transition--}}
{{--                            class="dropdown-menu show mt-2"--}}
{{--                            style="right: 0; left: auto; position: absolute;"--}}
{{--                    >--}}
{{--                        <a class="dropdown-item" href="{{ route('home') }}">--}}
{{--                            Profil--}}
{{--                        </a>--}}

{{--                        <a class="dropdown-item" href="{{ route('home') }}">--}}x
{{--                            Einstellungen--}}
{{--                        </a>--}}

{{--                        <div class="dropdown-divider"></div>--}}

{{--                        <form method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="dropdown-item text-danger">--}}
{{--                                Logout--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary ms-md-2">Ausloggen</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
