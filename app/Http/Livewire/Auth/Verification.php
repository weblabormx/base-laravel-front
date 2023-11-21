<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Livewire\Component;
use WireUi\Traits\Actions;

class Verification extends Component
{
    use Actions;

    public $userId;
    public $hash;

    public $resent = false;
    public $valid = false;

    public function mount(?int $id = null, ?string $hash = null)
    {
        $this->userId = $id;
        $this->hash = $hash;

        if (!$id && !$hash) {
            return;
        }

        /** @var User */
        $user = auth()->user();

        throw_unless(
            hash_equals($hash, sha1($user->getEmailForVerification())),
            AuthorizationException::class
        );

        if ($user->hasVerifiedEmail()) {
            $this->valid = true;
            return $this->redirectTo();
        }

        throw_unless($user->markEmailAsVerified());

        event(new Verified($user));

        $this->valid = true;

        return $this->redirectTo();
    }

    public function request()
    {
        /** @var User */
        $user = auth()->user();

        if ($user->hasVerifiedEmail()) {
            return;
        }

        $this->notification()->success('Verification email resent');
        $user->sendEmailVerificationNotification();
    }

    public function redirectTo()
    {
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('livewire.auth.verification')->layout('layouts.auth');
    }
}
