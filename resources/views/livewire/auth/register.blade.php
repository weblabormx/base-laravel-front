@if($view=='normal')
    <div class="flex flex-col justify-center py-12 min-h-full sm:px-6 lg:px-6">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto w-auto h-24" src="{{ asset(config('app.icon')) }}" alt="{{ config('app.name') }}">
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
    @include('livewire.auth.verify-email')
@endif