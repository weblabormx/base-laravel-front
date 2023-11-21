<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use WireUi\Traits\Actions;

class Login extends Component
{
    use Actions;

    public $email;
    public $password;

    public $remember = false;

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'boolean'
        ];
    }

    public function login()
    {
        $this->validate();

        if (auth()->attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {
            $this->reset('password');

            session()->put('auth.password_confirmed_at', time());

            session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $this->notification()->error('Wrong credentials', 'Please, try again');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
