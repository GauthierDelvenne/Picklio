<?php

namespace App\Livewire\Form\Front;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Stock;
use App\Models\StockMovement;
use Livewire\Component;
use Livewire\Form;

class ChooseSlotForm extends Form
{
    public $pickup_date;

    public $pickup_slot_id;

    public Order $order;

    public $orderItems;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->order = $component->order;
        $this->orderItems = $this->order->orderItems;
    }

    public function createOrder()
    {
        $validatedData = $this->validate();
        Order::updateOrCreate(['id' => $this->order->id],
            [
                'pickup_slot_id' => $validatedData['pickup_slot_id'],
                'pickup_date' => $validatedData['pickup_date'],
                'order_status_id' => OrderStatus::INWAIT,
            ]);
        foreach ($this->orderItems as $orderItem) {

            $stock = Stock::where('product_id', $orderItem->product_id)->first();
            $stock->decrement('quantity', $orderItem->quantity);
            $stock->decrement('quantity_reserved', $orderItem->quantity);

            StockMovement::create([
                'product_id' => $orderItem->product_id,
                'quantity' => -$orderItem->quantity,
                'type' => StockMovement::TYPE_SALE,
            ]);
        }

        return true;
    }

    public function rules(): array
    {
        return [
            'pickup_date' => 'required|date|after_or_equal:today',
            'pickup_slot_id' => 'required|exists:pickup_slots,id',
        ];
    }

    public function validationAttributes()
    {
        return [
            'pickup_date' => strtolower(__('front.slot.form.pickup_date.attribute')),
            'pickup_slot_id' => strtolower(__('front.slot.form.time.attribute')),
        ];
    }
}
