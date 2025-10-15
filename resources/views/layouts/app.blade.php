<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

<header>
</header>

<main>
    <div id="app">
        @yield('content')
    </div>
</main>

<footer>
</footer>

{{-- DEV: Vite server | PROD: built assets (manifest) --}}
@php $env = $_ENV['APP_ENV'] ?? 'production'; @endphp
@if ($env === 'local')
    {{-- escape the @ so Blade doesn’t parse it --}}
    <script type="module" src="http://localhost:5173/@@vite/client"></script>
    <script type="module" src="http://localhost:5173/resources/js/app.js"></script>
@else
    <script type="module" src="{{ vite_asset('resources/js/app.js') }}"></script>
@endif
</body>
</html>