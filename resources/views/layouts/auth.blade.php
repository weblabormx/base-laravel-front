<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sea Cow - App</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Scripts -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{config('app.icono')}}" />
    @livewireStyles
</head>
<body class="h-full">
    @include('partials.front-header')
           
  	<!-- Replace with your content -->
  	@include('flash::message')
  	@yield('content')
  	<!-- /End replace -->
     
    @include('partials.footer')
    @livewireScripts
    @stack('scripts-footer')
</body>
</html>
