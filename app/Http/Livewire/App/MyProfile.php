<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class MyProfile extends Component
{
    public function render()
    {
        return view('livewire.app.my-profile')->extends('layouts.app', [
            'breadcrumb' => [
                ['label' => __('My Profile'), 'url' => route('app.profile')]
            ]
        ]);
    }
}
