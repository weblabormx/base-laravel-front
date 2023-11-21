<div class="flex flex-col justify-center py-12 min-h-full sm:px-6 lg:px-6">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto w-auto h-24" src="{{ asset(config('app.icon')) }}" alt="Your Company">
        <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">
            @lang('Reset password')
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600">
            Or go
            <a href="{{ route('login') }}" class="font-medium text-teal-600 hover:text-teal-500">
                back to login
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            <form wire:submit.prevent="request" class="flex flex-col gap-6 p-4">
                <x-input
                    label="Email address"
                    wire:model.defer="email" />

                <x-button
                    type="submit"
                    label="Send reset link"
                    primary
                    full
                    lg />
            </form>
        </x-card>
    </div>


</div>
