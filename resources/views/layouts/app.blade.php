<!doctype html>
<html lang="en">
<head>
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    <title>My Project</title>
{{--    <link rel="stylesheet" href="styles.css">--}}
</head>
<body>

<header>
    <h1>Welcome to My Project</h1>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <div id="app">
        <h2>About</h2>
        <p>This is a simple HTML page structure you can build upon.</p>
        @yield('content')
    </div>
</main>

<footer>
    <p>testing footer</p>
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