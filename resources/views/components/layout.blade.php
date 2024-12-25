<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="../../css/app.css">
    @vite(['resources/css/app.css'])
</head>
<body>

    <main class="max-w-4xl mx-auto min-h-screen">
        @if (!request()->routeIs('login'))
            <x-header />
        @endif
        {{ $slot }}
    </main>

</body>
</html>
