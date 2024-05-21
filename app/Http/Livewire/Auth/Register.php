<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\ValidateEmail;

class Register extends Component
{
    public $user, $password, $password_confirmation, $code, $user_code;
    public $acceptTerms = false;
    public $view = 'register';

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
        if(config('auth.approach') == 'CreationValidation' && $this->view == 'register') {
            $this->code = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
            Mail::to($this->user->email)->send(new ValidateEmail($this->user->full_name, $this->code));
            $this->view = 'verify-email';
            return;
        }

        $this->user->new_password = $this->password;
        $this->user->save();

        $this->reset(['password', 'password_confirmation']);
        auth()->login($this->user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function validateCode()
    {
        $this->validate([
            'user_code' => 'required|same:code',
        ]);
        $this->user->email_verified_at = now();
        $this->register();
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
