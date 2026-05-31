<?php

namespace App\Livewire\Front;

use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Traits\SortingTrait;
use Livewire\Attributes\Computed;

class FrontOrders extends PicklioComponent
{
    use SortingTrait;
    public $search;
    public $account;

    public function mount(): void
    {
        $this->sortBy = 'pickup_date';
        $this->account = $this->userConnected->account;
    }

    #[Computed]
    public function orders()
    {
        return Order::with(['orderItems', 'orderItems.product.stock', 'orderItems.product.productCategory'])
            ->where('account_id', $this->account->id)
            ->when($this->search, function ($query) {
                $query->where('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->get();
    }
    public function sortByPrice()
    {
        $this->sortBy = 'total_price';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function sortByDate()
    {
        $this->sortBy = 'pickup_date';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    public function render()
    {
        return view('livewire.front.orders')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.order').' | Picklio');
    }
}
