<div class="flex flex-col justify-center py-12 min-h-full sm:px-6 lg:px-6">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto w-auto h-24" src="{{ asset(config('app.icon')) }}" alt="Your Company">
        <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">
            Sign in to your account
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600">
            Or
            <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500">
                start your 14-day free trial
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            <form wire:submit.prevent="login" class="flex flex-col gap-6 p-4">
                <x-input
                    label="Email address"
                    wire:model.defer="email" />

                <x-inputs.password
                    label="Password"
                    wire:model.defer="password" />

                <div class="flex justify-between items-center">
                    <x-checkbox
                        label="Remember me"
                        wire:model.defer="remember" />

                    <x-button
                        label="Forgot Your Password?"
                        :href="route('password.request')"
                        primary
                        flat />
                </div>

                <x-button
                    type="submit"
                    label="Sign in"
                    primary
                    full
                    lg />
            </form>
        </x-card>
    </div>


</div>
