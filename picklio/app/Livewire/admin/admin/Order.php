<?php

namespace App\Livewire\admin\admin;

use App\Livewire\PicklioComponent;
use App\Mail\CancelOrderMail;
use App\Mail\PreparedOrderMail;
use App\Models\Order as OrderModel;
use Flux\Flux;
use Mail;

class Order extends PicklioComponent
{
    public OrderModel $order;

    public function mount(OrderModel $order)
    {
        $this->order = $order;
    }

    public function endOrder()
    {
        $this->order->update([
            'status' => OrderModel::FINISHCART,
        ]);
        Mail::to($this->order->account->email)->send(new PreparedOrderMail($this->order));
        $this->redirectRoute('admin.order.index');
    }

    public function delete()
    {

        if ($this->order) {
            $email = $this->order->account->email;
            $code = $this->order->code;
            $this->order->orderItems()->delete();
            $this->order->delete();
            Flux::toast(__('admin.orders.toast.delete.success'), variant: 'success');
            Mail::to($email)->send(new CancelOrderMail($code));
            $this->redirectRoute('admin.order.index');
        } else {
            Flux::toast(__('admin.orders.toast.delete.error'), variant: 'danger');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin.order')
            ->layout('layouts.admin')
            ->title(__('commons.pageName.admin.admin.order').' | Admin');

    }
}
