<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                Password::min(4),
            ],
        ];
    }

    public function register()
    {
        $this->validate();

        /** @var User */
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['password', 'password_confirmation']);

        event(new Registered($user));

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }
}
