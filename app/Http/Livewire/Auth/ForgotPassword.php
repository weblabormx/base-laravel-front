<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use WireUi\Actions\Dialog;
use WireUi\Traits\Actions;

class ForgotPassword extends Component
{
    use Actions;

    public $email;

    public $origin;

    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }

    public function mount()
    {
        $this->origin = url()->previous();
    }

    public function request()
    {
        $this->validate();

        $response = Password::broker()->sendResetLink([
            'email' => $this->email
        ]);

        if ($response !== Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'email' => [trans($response)],
            ]);
            return;
        }

        $this->dialog()->confirm([
            'icon' => Dialog::SUCCESS,
            'title' => 'Reset link sent!',
            'description' => 'Please, check your email for futher instructions',
            'accept'      => [
                'label'  => 'Okay',
                'method' => 'back',
                'params' => [],
            ],
        ]);
    }

    public function back()
    {
        return redirect($this->origin);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.auth');
    }
}
