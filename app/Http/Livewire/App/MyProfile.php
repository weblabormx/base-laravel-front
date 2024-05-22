<?php

namespace App\Http\Livewire\App;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image as Intervention;
use Illuminate\Support\Facades\Storage;

class MyProfile extends Component
{
    use Actions, WithFileUploads;

    public $password = [], $avatar;

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

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'required|image|max:1024',
        ]);
        $file_name = 'avatars/'.auth()->id().'.'.$this->avatar->guessExtension();
        $new_file = Intervention::make($this->avatar->temporaryUrl());
		$new_file->fit(400, 400);	
        Storage::put($file_name, (string) $new_file->encode());

        auth()->user()->update([
            'photo' => $file_name,
        ]);
        $this->reset('avatar');
        $this->dialog()->success(__('Sucesss'), __('Avatar updated correctly'));
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
