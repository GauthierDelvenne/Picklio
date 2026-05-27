<?php

namespace App\Livewire\front;

use App\Livewire\PicklioComponent;
use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

class Home extends PicklioComponent
{
    public $alimentaryCategories;

    public $noAlimentaryCategories;

    #[Url(as: 'categorie')]
    public $activeTab = 'alimentaire';

    public function mount()
    {
        $this->alimentaryCategories = config('category.alimentary');
        $this->noAlimentaryCategories = config('category.noAlimentary');
    }

    public function changeTab($tabName)
    {
        $this->activeTab = $tabName;
    }

    #[Computed]
    public function alimentaryProducts()
    {
        return Product::with([
            'stock',
            'productCategory',
            'account.user',
        ])->alimentaryProduct()->limit(6)->get();
    }

    #[Computed]
    public function noAlimentaryProducts()
    {
        return Product::with([
            'stock',
            'productCategory',
            'account.user',
        ])->noAlimentaryProduct()->limit(6)->get();
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
        return view('livewire.front.home')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.home').' | Picklio');
    }
}
