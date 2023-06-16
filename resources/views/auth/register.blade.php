@extends('layouts.auth')

@section('content')
    <div class="flex flex-col justify-center py-12 min-h-full sm:px-6 lg:px-6">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto w-auto h-24" src="{{ asset(config('app.icon')) }}" alt="Your Company">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">Create your Account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" autocomplete="name"
                                class="block px-3 py-2 w-full placeholder-gray-400 rounded-md border border-gray-300 shadow-sm appearance-none focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm"
                                value="{{ old('name') }}">

                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email"
                                class="block px-3 py-2 w-full placeholder-gray-400 rounded-md border border-gray-300 shadow-sm appearance-none focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm"
                                value="{{ old('email') }}">

                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                class="block px-3 py-2 w-full placeholder-gray-400 rounded-md border border-gray-300 shadow-sm appearance-none focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm">

                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="block px-3 py-2 w-full placeholder-gray-400 rounded-md border border-gray-300 shadow-sm appearance-none focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm">

                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex justify-center px-4 py-2 w-full text-sm font-medium text-white bg-teal-600 rounded-md border border-transparent shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                            Sign up
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
