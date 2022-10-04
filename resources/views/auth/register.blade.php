@extends('layouts.auth')

@section('content')

    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-6">
      <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-24 w-auto" src="{{config('app.icono')}}" alt="Your Company">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create your Account</h2>
      </div>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
          <form class="space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <div class="mt-1">
                <input id="name" name="name" type="text" autocomplete="name" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" value="{{ old('name') }}">
                @include('partials.input-error', ['input' => 'name'])
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" value="{{ old('email') }}">
                @include('partials.input-error', ['input' => 'email'])
              </div>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                @include('partials.input-error', ['input' => 'password'])
              </div>
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
              <div class="mt-1">
                <input id="password_confirmation" name="password_confirmation" type="password" class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                @include('partials.input-error', ['input' => 'password_confirmation'])
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Sign up</button>
            </div>
          </form>

        </div>
      </div>
    </div>

@endsection
