<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\Form\Admin\Client\UpdateProductForm;
use App\Livewire\Form\Admin\Client\UpdateStockForm;
use App\Livewire\PicklioComponent;
use App\Models\Product;
use App\Models\StockMovement;
use Flux\Flux;
use Livewire\Attributes\Computed;

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
            Flux::toast(__('admin.stocks.toast.update.success'), variant: 'success');
            Flux::modal('update-stock')->close();
            $this->formStock->reset();
        } else {
            Flux::toast(__('admin.stocks.toast.update.error'), variant: 'danger');
        }
    }

    public function update()
    {
        if ($this->form->update()) {
            Flux::toast(__('client.products.toast.update.success'), variant: 'success');
            Flux::modal('update-product')->close();
            $this->form->reset();
            $this->product->refresh();
        } else {
            Flux::toast(__('client.products.toast.update.error'), variant: 'danger');
        }
    }
    public function delete()
    {
        $productUpdated = $this->product->update([
            'name' => $this->product->name . ' (' . __('words.no-dispo') . ')',
            'is_active' => false,
        ]);
        if ($productUpdated) {
            Flux::toast(__('client.products.toast.delete.success'), variant: 'success');
            Flux::modal('delete-merchant')->close();
        } else {
            Flux::toast(__('client.products.toast.delete.error'), variant: 'danger');
        }
    }
    #[Computed]
    public function stockMouvements()
    {
        return StockMovement::with('product')
            ->where('product_id', $this->product->id)
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.admin.admin.stock')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.stock').' | Admin');
    }
}
