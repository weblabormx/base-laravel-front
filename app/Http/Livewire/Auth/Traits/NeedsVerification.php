<?php

namespace App\Http\Livewire\Auth\Traits;

use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\ValidateEmail;

trait NeedsVerification 
{
    public $code, $user_code, $afterFunction, $view = 'normal';

    public function verifyEmail($afterFunction)
    {
        $this->afterFunction = $afterFunction;
        $this->code = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 10)), 0, 10);
        Mail::to($this->user->email)->send(new ValidateEmail($this->user->full_name, $this->code));
        $this->view = 'verify-email';
    }

    public function validateCode()
    {
        $this->validate([
            'user_code' => 'required|same:code',
        ]);
        $this->user->update(['email_verified_at' => now()]);
        $this->view = 'normal';
        $function = $this->afterFunction;
        $this->$function();
    }

}