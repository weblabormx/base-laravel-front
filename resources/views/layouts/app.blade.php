<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sea Cow - App</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" href="{{config('app.icono')}}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full">
    <div id="app">
        <div x-data="{ menu_user: false, menu: false }">
          <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
          <div class="relative z-40 md:hidden" role="dialog" aria-modal="true" x-show="menu">
            <!--
              Off-canvas menu backdrop, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

            <div class="flex fixed inset-0 z-40">
              <!--
                Off-canvas menu, show/hide based on off-canvas menu state.

                Entering: "transition ease-in-out duration-300 transform"
                  From: "-translate-x-full"
                  To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                  From: "translate-x-0"
                  To: "-translate-x-full"
              -->
              <div class="flex relative flex-col flex-1 pt-5 pb-4 w-full max-w-xs bg-white">
                <!--
                  Close button, show/hide based on off-canvas menu state.

                  Entering: "ease-in-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-0 right-0 pt-2 -mr-12">
                  <button type="button" class="flex justify-center items-center ml-1 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" x-on:click="menu = !menu">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x-mark -->
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>

                <div class="flex flex-shrink-0 items-center px-4">
                  <img class="w-auto h-8" src="{{config('app.logo')}}" alt="Your Company">
                </div>
                <div class="overflow-y-auto flex-1 mt-5 h-0">
                  <nav class="px-2 space-y-1">
                    @include('front.sidebar')
                  </nav>
                </div>
              </div>

              <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
              </div>
            </div>
          </div>

          <!-- Static sidebar for desktop -->
          <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex overflow-y-auto flex-col flex-grow pt-5 bg-white border-r border-gray-200">
              <div class="flex flex-shrink-0 items-center px-4">
                <img class="w-auto h-10" src="{{config('app.icono')}}" alt="Your Company">
              </div>
              <div class="flex flex-col flex-grow mt-5">
                <nav class="flex-1 px-2 pb-4 space-y-1">
                  @include('front.sidebar')
                </nav>
              </div>
            </div>
          </div>
          <div class="flex flex-col flex-1 md:pl-64">
            <div class="flex sticky top-0 z-10 flex-shrink-0 h-16 bg-white shadow">
              <button type="button" class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 md:hidden" x-on:click="menu = !menu">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/bars-3-bottom-left -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>
              </button>
              <div class="flex flex-1 justify-between px-4">
                <div class="flex flex-1">
                  @isset($front)
                      <form action="{{$front->base_url}}" method="GET" class="flex w-full md:ml-0">
                        <label for="search-field" class="sr-only">Search</label>
                        @php $request = collect(request()->all())->filter(function($item, $key) { return $key!='search' && !is_array($item) && strlen($item)>0; }); @endphp
                        @foreach($request as $key => $value)
                            <input type="hidden" name="{{$key}}" value="{{$value}}">
                        @endforeach
                        <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                          <div class="flex absolute inset-y-0 left-0 items-center pointer-events-none">
                            <!-- Heroicon name: mini/magnifying-glass -->
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                          </div>
                          <input id="search-field" class="block py-2 pr-3 pl-8 w-full h-full placeholder-gray-500 text-gray-900 border-transparent focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="{{__('Search')}} {{$front->label}}" type="search" name="search" value="{{request()->search}}">
                        </div>
                      </form>
                  @endisset
                </div>
                <div class="flex items-center ml-4 md:ml-6">
                  <button type="button" class="p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                  </button>

                  <!-- Profile dropdown -->
                  <div class="relative ml-3">
                    <div>
                      <button type="button" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true" x-on:click="menu_user = !menu_user">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="{{auth()->user()->avatar}}" alt="Profile image">
                      </button>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="absolute right-0 z-10 py-1 mt-2 w-48 bg-white rounded-md ring-1 ring-black ring-opacity-5 shadow-lg origin-top-right focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-show="menu_user">
                      <!-- Active: "bg-gray-100", Not Active: "" -->
                      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                      <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

                      <div class="" aria-labelledby="navbarDropdown">
                        <a class="block px-4 py-2 text-sm text-gray-700" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <main class="flex-1">
              <div class="py-6">
                <div class="px-4 mx-auto sm:px-6 md:px-8">
                  <!-- Replace with your content -->
                  @include('flash::message')
                  @yield('content')
                  <!-- /End replace -->
                </div>
              </div>
            </main>
          </div>
        </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    @stack('scripts-footer')
</body>
</html>
