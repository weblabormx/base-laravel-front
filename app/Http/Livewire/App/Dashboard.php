<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.app.dashboard')->layout('layouts.app', [
            'breadcrumb' => [
                ['label' => __('Dashboard'), 'url' => route('app.dashboard')]
            ]
        ]);
    }
}
