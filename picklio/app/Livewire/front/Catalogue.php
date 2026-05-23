<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;
use App\Models\Product;
use Livewire\Attributes\Computed;

class Catalogue extends PicklioComponent
{
    public $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    #[Computed]
    public function products()
    {
        return Product::with([
            'stock',
            'productCategory',
            'account',
        ])->where('is_active', 1)
            ->limit(6)->get();
    }
    public function goToCategory($categoryId): void
    {
        session(['category' => [$categoryId]]);
        $this->redirect(route('front.catalogue.index'));
    }

    public function goToMerchant($merchantId)
    {
        session(['merchant' => [$merchantId]]);
        $this->redirect(route('front.catalogue.index'));
    }

    public function render()
    {
        return view('livewire.front.product')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.product').' | Picklio');
    }
}
