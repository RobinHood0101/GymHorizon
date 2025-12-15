<footer class="text-center bg-dark">
        <div class="container text-white py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><a class="link-light" href="https://greatrobin.com" target="_blank">About me</a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="{{ route('contact') }}">Contact me</a></li>
                <li class="list-inline-item"><a class="link-light" href="https://github.com/robinhood0101">Github</a></li>
            </ul>
            <p class="mb-0" style="color: var(--bs-border-color);">© 2024 - {{ now()->year }} GymHorizon</p>
        </div>
{{--
    <p><a href="{{ route('home', ['first_login' => true]) }}">Quick Start Guide</a></p>
--}}
    </footer>
