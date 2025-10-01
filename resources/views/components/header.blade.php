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
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Allgemein </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{ request()->is('tipps*') ? 'text-white' : ''}}" href="/tipps" style="color: var(--bs-navbar-color);">Tipps</a>
                        <a class="dropdown-item {{ request()->is('ernaehrung*') ? 'text-white' : ''}}" href="/ernaehrung" style="color: var(--bs-navbar-color);">Ernährung</a>
                        <a class="dropdown-item {{ request()->is('anatomie*') ? 'text-white' : ''}}" href="/anatomie" style="color: var(--bs-navbar-color);">Anatomie</a>
                    </div>
                </li>
{{--                <li class="nav-item"><a class="nav-link {{ request()->is('tipps*') ? 'text-white' : ''}}" href="/tipps" style="color: var(--bs-navbar-color);">Tipps</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link {{ request()->is('ernaehrung*') ? 'text-white' : ''}}" href="/ernaehrung" style="color: var(--bs-navbar-color);">Ernährung</a></li>--}}
{{--                <li class="nav-item"><a class="nav-link {{ request()->is('anatomie*') ? 'text-white' : ''}}" href="/anatomie">Anatomie</a></li>--}}
                <li class="nav-item"><a class="nav-link {{ request()->is('uebungen*') ? 'text-white' : ''}}" href="/uebungen" style="color: var(--bs-navbar-color);">Übungen</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('wochenplan*') ? 'text-white' : ''}}" href="/wochenplan" style="color: var(--bs-navbar-color);">Wochenplan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('trainingsplan*') ? 'text-white' : ''}}" href="/trainingsplan" style="color: var(--bs-navbar-color);">Trainingsplan</a></li>
            </ul>
            @guest
                <a class="btn btn-primary ms-md-2" role="button" href="register">Registrieren</a><a class="btn btn-primary ms-md-2" role="button" href="login">Einloggen</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary ms-md-2">Ausloggen</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
