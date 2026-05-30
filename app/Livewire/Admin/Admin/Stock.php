<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\form\admin\Client\UpdateProductForm;
use App\Livewire\form\admin\Client\UpdateStockForm;
use App\Livewire\PicklioComponent;
use App\Models\Product;
use Flux\Flux;

class Stock extends PicklioComponent
{
    public Product $product;

    public UpdateProductForm $form;

    public UpdateStockForm $formStock;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->form->product = $this->product;
        $this->form->setProperties();
        $this->formStock->product = $this->product;
        $this->formStock->setProperties();
    }

    public function updateStock()
    {
        if ($this->formStock->update()) {
            Flux::toast(__('client.stocks.toast.update.success'), variant: 'success');
        } else {
            Flux::toast(__('client.stocks.toast.update.error'), variant: 'danger');
        }
    }

    public function update()
    {
        if ($this->form->update()) {
            Flux::toast(__('client.products.toast.update.success'), variant: 'success');
        } else {
            Flux::toast(__('client.products.toast.update.error'), variant: 'danger');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin.stock')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.stock').' | Admin');
    }
}
