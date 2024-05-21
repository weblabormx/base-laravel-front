@if($view=='register')
    <div class="flex flex-col justify-center py-12 min-h-full sm:px-6 lg:px-6">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto w-auto h-24" src="{{ asset(config('app.icon')) }}" alt="Your Company">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">{{ __('Create your Account') }}</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <x-card>
                <form wire:submit.prevent="register" class="flex flex-col gap-6 p-4">
                    <x-input :label="__('Name')" wire:model.defer="user.name" />
                    <x-input :label="__('Email address')" wire:model.defer="user.email" />
                    <x-inputs.password :label="__('Password')" wire:model.defer="password" />
                    <x-inputs.password :label="__('Confirm Password')" wire:model.defer="password_confirmation" />
                    <section class="flex items-baseline gap-2">
                        <x-checkbox wire:model.defer="acceptTerms" id='acceptTerms' />
                        <label for='acceptTerms'>
                            {{ __('I agree to the') }} <a target="_blank" href="{{ route('terms') }}" class="text-primary-500">{{ __('Terms and Conditions') }}</a>
                        </label>
                    </section>
                    <x-button type="submit" :label="__('Sign up')" primary full lg />
                </form>
            </x-card>
        </div>
    </div>
@elseif($view=='verify-email')
    <div class="justify-center bg-white py-16">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Please confirm your email</h2>
                <p class="text-gray-600 mb-6">An email with a code was sent to your email.</p>
            </div>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
            <x-card>
                <form wire:submit.prevent="validateCode" class="flex flex-col gap-6 p-4">
                    <x-input label="Validation Code" wire:model.defer="user_code" />
                    <x-button type="submit" label="Confirm Email" primary full lg />
                </form>
            </x-card>
        </div>
    </div>
@endif