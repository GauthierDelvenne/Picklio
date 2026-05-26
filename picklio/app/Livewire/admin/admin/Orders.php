<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use App\Mail\CancelOrderMail;
use App\Models\Order;
use App\Traits\SortingTrait;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use Mail;

class Orders extends PicklioComponent
{
    use SortingTrait;
    use WithPagination;

    public $search;

    public $historySearch;

    public function mount(): void
    {
        $this->sortBy = 'pickup_date';
    }

    public function updated()
    {
        $this->resetPage();
    }

    #[Computed]
    public function orders()
    {
        return Order::OrderInWait()
            ->when($this->search, function ($query) {
                $query->where('code', 'like', '%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->orderBy('pickup_slots.time', $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function historyOrders()
    {
        return Order::with(['account', 'pickupSlot'])
            ->join('accounts', 'accounts.id', '=', 'orders.account_id')
            ->select('orders.*')
            ->where('status', Order::FINISHCART)
            ->when($this->historySearch, function ($query) {
                $query->where('accounts.firstname', 'like', '%'.$this->historySearch.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(15);
    }

    #[Computed]
    public function todayOrder()
    {
        return Order::where('pickup_date', today())->count();
    }

    #[Computed]
    public function inWaitOrder()
    {
        return Order::where('status', Order::INWAITCART)->count();
    }

    #[Computed]
    public function finishOrder()
    {
        return Order::where('status', Order::FINISHCART)->count();
    }

    public function delete($uuid)
    {
        $order = Order::where('uuid', $uuid)->firstOrFail();
        $email = $order->account->email;
        if ($order->orderItems()->delete()) {
            $order->delete();
            Flux::toast(__('admin.orders.toast.delete.success'), variant: 'success');
            Mail::to($email)->send(new CancelOrderMail);
        } else {
            Flux::toast(__('admin.orders.toast.delete.error'), variant: 'danger');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin.orders')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.orders').' | Admin');
    }
}
