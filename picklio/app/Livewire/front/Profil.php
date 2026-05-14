<?php

namespace App\Livewire\front;

use App\Livewire\form\front\UpdatePasswordForm;
use App\Livewire\form\front\UpdateProfilForm;
use App\Livewire\PicklioComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Profil extends PicklioComponent
{
    public UpdateProfilForm $form;

    public UpdatePasswordForm $formPassword;

    public function updatePassword()
    {
        if ($this->formPassword->update()) {
            $this->dispatch('update');
        }
    }

    public function update()
    {
        if ($this->form->update()) {
            $this->dispatch('update');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();

        $this->redirectRoute('front.home', navigate: true);
    }

    public function delete()
    {
        $this->form->account->update([
            'email' => $this->form->email.now(), ]);
        $this->form->account->delete();
        $this->form->user->update([
            'email' => $this->form->email.now(), ]);
        $this->form->user->delete();
        $this->dispatch('deleteAccount');
    }

    public function render()
    {
        return view('livewire.front.profil')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.profil').' | Picklio');
    }
}
