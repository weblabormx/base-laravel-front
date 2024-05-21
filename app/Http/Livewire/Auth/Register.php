<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    use Traits\NeedsVerification;

    public $user, $password, $password_confirmation;
    public $acceptTerms = false;

    public function rules()
    {
        return [
            'user.name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(4),
            ],
            'acceptTerms' => ['accepted'],
        ];
    }

    public function mount()
    {
        $this->user = new User;
    }
    
    public function register()
    {
        $this->validate();
        if(config('auth.approach') == 'CreationValidation' && $this->view == 'normal') {
            return $this->verifyEmail('register');
        }

        $this->user->new_password = $this->password;
        $this->user->save();

        $this->reset(['password', 'password_confirmation']);
        auth()->login($this->user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
