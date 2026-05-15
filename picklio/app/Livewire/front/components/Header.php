<?php

namespace App\Livewire\front\components;

use App\Livewire\PicklioComponent;
use App\Models\Role;
use Illuminate\Contracts\View\View;

class Header extends PicklioComponent
{
    public $is_admin = false;

    public $is_merchant = false;

    public function mount()
    {
        if (! empty($this->userConnected)) {
            if ($this->userConnected->account->role_id == Role::ADMIN || $this->userConnected->account->role_id == Role::WAREHOUSE) {
                $this->is_admin = true;
            }
            if ($this->userConnected->account->role_id == Role::MERCHANT) {
                $this->is_merchant = true;
            }
        }
    }

    public function render(): View
    {
        return view('partials.front.header');
    }
}
