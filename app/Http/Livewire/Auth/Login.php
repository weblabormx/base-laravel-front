<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{
    use Actions, Traits\NeedsVerification;

	public $email, $password, $code, $user_code, $user;
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

        if (Auth::attemptWhen([
            'email' => $this->email,
            'password' => $this->password
        ], function($user) {
            // Validate email before login if hasnt been validated yet
            if(
                (config('auth.approach') == 'LoginValidation' || config('auth.approach') == 'CreationValidation') && 
                $this->view == 'normal' &&
                is_object($user) &&
                is_null($user->email_verified_at)
            ) {
                $this->user = $user;
                $this->verifyEmail('login');
                return false;
            }
            return true;
        }, $this->remember)) {
            $this->reset('password');
            session()->put('auth.password_confirmed_at', time());
            session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $this->notification()->error(__('Wrong credentials'), __('Please, try again'));
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
