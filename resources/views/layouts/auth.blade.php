<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', config('app.name')) </title>

    <link rel="shortcut icon" href="{{ asset(config('app.icon')) }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    @include('flash::message')
    @yield('content')

    @stack('scripts-footer')
</body>

</html>
