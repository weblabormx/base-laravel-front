<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class AccountManager extends Component
{
    use Actions;

    public $user;
    public $rules = [
        'user.name' => ['required', 'string', 'max:255']
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.account-manager');
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        $this->notification()->success('Updated information');
    }
}
