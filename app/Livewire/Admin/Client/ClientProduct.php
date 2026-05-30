<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\form\admin\Client\AddProductForm;
use App\Livewire\PicklioComponent;
use Flux\Flux;
use Livewire\WithFileUploads;

class ClientProduct extends PicklioComponent
{
    use WithFileUploads;

    public AddProductForm $form;

    public function create()
    {
        if ($this->form->create()) {
            Flux::toast(__('client.products.toast.create.success'), variant: 'success');
            Flux::modal('add-product')->close();
            $this->form->reset();
        } else {
            Flux::toast(__('client.products.toast.create.error'), variant: 'danger');
        }
    }

    public function render()
    {
        return view('livewire.admin.client.client-product');
    }
}
