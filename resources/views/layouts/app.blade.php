<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', config('app.name')) </title>

    <link rel="shortcut icon" href="{{ asset(config('app.icon')) }}" />

    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100">
    <x-notifications />
    <x-dialog />

    {{ $slot }}

    @livewireScripts
</body>

</html>
