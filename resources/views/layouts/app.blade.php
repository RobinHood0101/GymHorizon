<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title', 'GymHorizon')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Site-specific styles --}}
    @stack('styles')

    {{-- Site-specific scripts --}}
    @stack('scripts-head')
</head>
<body class="@yield('body_class')">
    <x-header />

    {{-- Optional Hero-Section --}}
    @hasSection('hero')
        @yield('hero')
    @endif

    <main class="container">
        @yield('content')
    </main>

    <x-footer />

    {{-- Site-specific scripts --}}
    @stack('scripts')

    <noscript>JavaScript is required for full functionality of this site.</noscript>
</body>
</html>
