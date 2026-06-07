<?php

namespace App\Livewire\Admin\Admin;

use App\Livewire\PicklioComponent;
use App\Models\Account;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Role;
use App\Models\Status;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use App\Models\Order;

class Statistics extends PicklioComponent
{
    #[Computed]
    public function finishedOrders()
    {
        return Order::where('order_status_id', OrderStatus::FINISH)
            ->get(['total_price', 'pickup_date']);
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
            ->whereBetween('pickup_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->count();
    }

    #[Computed]
    public function orderDayCount()
    {
        return $this->finishedOrders
            ->where('pickup_date', Carbon::today()->format('Y-m-d'))
            ->count();
    }

    #[Computed]
    public function orderPriceCount()
    {
        return $this->toPriceFormat($this->finishedOrders->sum('total_price'));
    }

    public function toPriceFormat($value)
    {
        return number_format($value / 100, 2, ',', ' ') . ' €';
    }

    #[Computed]
    public function orderMonthPriceCount()
    {
        $cents = $this->finishedOrders
            ->whereBetween('pickup_date', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('total_price');

        return $this->toPriceFormat($cents);
    }

    #[Computed]
    public function orderDayPriceCount()
    {
        $cents = $this->finishedOrders
            ->where('pickup_date', Carbon::today()->format('Y-m-d'))
            ->sum('total_price');

        return $this->toPriceFormat($cents);
    }


    #[Computed]
    public function merchantCount()
    {
        return Account::where('role_id', Role::MERCHANT)
            ->where('status_id', Status::ACTIVE)
            ->count();
    }

    #[Computed]
    public function productCount()
    {
        return Product::where('is_active', 1)
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.admin.statistics')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.statistics') . ' | Admin');
    }
}
