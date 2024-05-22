<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use WireUi\Traits\Actions;

class MyProfile extends Component
{
    use Actions;

    public $password = [];

    protected function validationAttributes()
    {
        return [
            'password.new' => __('New password'),
            'password.new_confirmation' => __('Confirm password'),
        ];
    }

    public function changePassword()
    {
        $this->validate([
            'password.new' => 'required|min:8|confirmed',
            'password.new_confirmation' => 'required',
        ]);
        auth()->user()->update([
            'new_password' => $this->password['new'],
        ]);

        $this->reset('password');

        $this->dialog()->success(__('Sucesss'), __('Password changed correctly'));
    }
    public function render()
    {
        return view('livewire.app.my-profile')->extends('layouts.app', [
            'breadcrumb' => [
                ['label' => __('My Profile'), 'url' => route('app.profile')]
            ]
        ]);
    }
}
