<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sea Cow - Be part of the cripto easily</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{config('app.icono')}}" />
    </head>
    <body class="antialiased">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white">
          @include('partials.front-header')

          <!-- Hero card -->
          <div class="relative">
            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
              <div class="relative shadow-xl sm:overflow-hidden sm:rounded-2xl">
                <div class="absolute inset-0">
                  <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100" alt="People working on laptops">
                  <div class="absolute inset-0 bg-blue-700 mix-blend-multiply"></div>
                </div>
                <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                  <h1 class="text-center text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
                    <span class="block text-white">Send and receive payments</span>
                    <span class="block text-blue-200">quickly and easily</span>
                  </h1>
                  <p class="mx-auto mt-6 max-w-lg text-center text-xl text-blue-200 sm:max-w-3xl">Keep track of all your wallets and transactions in one place.</p>
                  <div class="mx-auto mt-10 max-w-sm sm:flex sm:max-w-none sm:justify-center">
                    <div class="space-y-4 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5 sm:space-y-0">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
          <div class="bg-gray-100">
            <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
              <p class="text-center text-base font-semibold text-gray-500">Powered By Sea Cow Token (HASH)</p>
            </div>
          </div>

        </div>
        <!-- More main page content here... -->
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="relative overflow-hidden bg-white pt-16 pb-32">
          <div class="relative">
            <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
              <div class="mx-auto max-w-xl px-4 sm:px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0">
                <div>
                  <div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-md bg-blue-600">
                      <!-- Heroicon name: outline/inbox -->
                      <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                      </svg>
                    </span>
                  </div>
                  <div class="mt-6">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">For Users</h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Send and receive payments between your SeaCow wallets or any other in the network.    
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        Generate payment links for your products or services.
                    </p>
                    <div class="mt-6">
                      <a href="#" class="inline-flex rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700">Get started</a>
                    </div>
                  </div>
                </div>
                <div class="mt-8 border-t border-gray-200 pt-6">
                  <blockquote>
                    <div>
                      <p class="text-base text-gray-500">
                        Using Hierarchical Deterministic (HD) wallets you can create the N number of wallets you want quickly, easily and securely.
                      </p>
                    </div>
                    <footer class="mt-3">
                    </footer>
                  </blockquote>
                </div>
              </div>
              <div class="mt-12 sm:mt-16 lg:mt-0">
                <div class="-mr-48 pl-4 sm:pl-6 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                  <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/inbox-app-screenshot-1.jpg" alt="Inbox user interface">
                </div>
              </div>
            </div>
          </div>
          <div class="mt-24">
            <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
              <div class="mx-auto max-w-xl px-4 sm:px-6 lg:col-start-2 lg:mx-0 lg:max-w-none lg:py-32 lg:px-0">
                <div>
                  <div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-md bg-blue-600">
                      <!-- Heroicon name: outline/sparkles -->
                      <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                      </svg>
                    </span>
                  </div>
                  <div class="mt-6">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">For bussiness</h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Make your business grow with the SeaCow payment gateway API.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                       Charges or recurring charges for your customers using SeaCow.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        All invoices in one place with NFTs.
                     </p>
                    <div class="mt-6">
                      <a href="#" class="inline-flex rounded-md border border-transparent bg-blue-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-blue-700">Documentation</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-12 sm:mt-16 lg:col-start-1 lg:mt-0">
                <div class="-ml-48 pr-4 sm:pr-6 md:-ml-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                  <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/inbox-app-screenshot-2.jpg" alt="Customer profile user interface">
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('partials.footer')
    </body>
</html>
