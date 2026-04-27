<?php

namespace App\Livewire\auth;

use App\Livewire\PicklioComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class Logout extends PicklioComponent
{
    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();

        $this->redirectRoute('auth.login', navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
