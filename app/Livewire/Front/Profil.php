<?php

namespace App\Livewire\Front;

use App\Livewire\Form\Front\UpdatePasswordForm;
use App\Livewire\Form\Front\UpdateProfilForm;
use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;

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
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->dispatch('deleteAccount');
        $this->redirectRoute('front.home');
    }

    #[Computed]
    public function orders()
    {
        return Order::with(['orderItems', 'orderItems.product.stock', 'orderItems.product.productCategory'])
            ->where('account_id', $this->form->account->id)
            ->whereIn('order_status_id', [OrderStatus::FINISH, OrderStatus::INWAIT])
            ->orderBy('pickup_date', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.front.profil')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.profil').' | Picklio');
    }
}
