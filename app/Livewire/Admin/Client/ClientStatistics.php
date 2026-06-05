<?php

namespace App\Livewire\Admin\Client;

use App\Livewire\PicklioComponent;
use App\Models\OrderItem;
use Carbon\Carbon;
use Livewire\Attributes\Computed;

class ClientStatistics extends PicklioComponent
{
    #[Computed]
    public function finishedOrders()
    {
        return OrderItem::with('order:id,pickup_date')
            ->where('merchant_id', $this->userConnected->account->id)
            ->get();
    }

    #[Computed]
    public function orderCount()
    {
        return $this->finishedOrders->count();
    }

    #[Computed]
    public function orderMonthCount()
    {
        return $this->finishedOrders
            ->whereBetween('order.pickup_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->count();
    }

    #[Computed]
    public function orderDayCount()
    {
        return $this->finishedOrders
            ->where('order.pickup_date', Carbon::today()->format('Y-m-d'))
            ->count();
    }

    #[Computed]
    public function orderPriceCount()
    {
        return $this->toPriceFormat($this->finishedOrders->sum('price'));
    }

    public function toPriceFormat($value)
    {
        return number_format($value / 100, 2, ',', ' ') . ' €';
    }

    #[Computed]
    public function orderMonthPriceCount()
    {
        $cents = $this->finishedOrders
            ->whereBetween('order.pickup_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('price');

        return $this->toPriceFormat($cents);
    }

    #[Computed]
    public function orderDayPriceCount()
    {
        $cents = $this->finishedOrders
            ->where('order.pickup_date', Carbon::today()->format('Y-m-d'))
            ->sum('price');

        return $this->toPriceFormat($cents);
    }

    public function render()
    {
        return view('livewire.admin.client.statistics')
            ->layout('layouts.client')
            ->title(__('commons.pageName.admin.admin.statistics') . ' | Client');
    }
}
