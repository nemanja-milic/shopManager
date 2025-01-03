<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Application')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="overflow-x-hidden bg-white text-black dark:bg-customDark dark:text-white">

    <main class="max-w-4xl mx-auto min-h-screen">
        @if (!request()->routeIs('login'))
            <x-header />
        @endif
        {{ $slot }}
    </main>

    @vite(["resources/ts/app.ts"])
</body>
</html>
