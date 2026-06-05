<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\Form\Admin\Client\UpdateProductForm;
use App\Livewire\PicklioComponent;
use App\Models\Product;
use App\Models\StockMovement;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class ClientStock extends PicklioComponent
{
    use WithFileUploads;

    public Product $product;
    public UpdateProductForm $form;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->form->product = $this->product;
        $this->form->setProperties();
    }

    public function delete()
    {
        $productUpdated = $this->product->update([
            'name' => $this->product->name . ' (' . __('words.no-dispo') . ')',
            'is_active' => false,
        ]);
        if ($productUpdated) {
            Flux::toast(__('client.products.toast.delete.success'), variant: 'success');
            Flux::modal('delete-product')->close();
            $this->redirectRoute('client.stock.index');
        } else {
            Flux::toast(__('client.products.toast.delete.error'), variant: 'danger');
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

    #[Computed]
    public function stockMouvements()
    {
        return StockMovement::with('product')
            ->where('product_id', $this->product->id)
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.client.stock')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.stock') . ' | ' . __('commons.pageName.admin.client.stock'));
    }
}
