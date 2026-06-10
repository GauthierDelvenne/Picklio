<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\Form\Admin\Client\AddProductForm;
use App\Livewire\PicklioComponent;
use App\Mail\ClientMessageMail;
use App\Mail\NewProductMail;
use App\Models\Account;
use App\Models\Role;
use Flux\Flux;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;

class ClientProduct extends PicklioComponent
{
    use WithFileUploads;

    public AddProductForm $form;

    public function create()
    {
        $product = $this->form->create();
        if ($product) {
            Flux::toast(__('client.products.toast.create.success'), variant: 'success');
            Flux::modal('add-product')->close();
            $account = Account::where('role_id', Role::ADMIN)->first();
            $email = $account->email;
            $merchant = Account::where('id', $this->form->account_id)->first();
            Mail::to($email)->send(new NewProductMail($merchant, $product));
            $this->form->reset();
            $this->redirectRoute('client.stock.show', $product->id);
        } else {
            Flux::toast(__('client.products.toast.create.error'), variant: 'danger');
        }
    }

    public function render()
    {
        return view('livewire.admin.client.client-product');
    }
}
