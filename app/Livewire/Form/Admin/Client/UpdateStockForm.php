<?php

namespace App\Livewire\Form\Admin\Client;

use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\StockMovementType;
use Livewire\Component;
use Livewire\Form;

class UpdateStockForm extends Form
{
    public $product;

    public $account_id;

    public $realQuantity;

    public $quantity;

    public $type = StockMovementType::TYPE_SUPPLY;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
    }

    public function setProperties()
    {
        if (!$this->product) {
            return;
        }
        $this->realQuantity = $this->product->stock->quantity;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $stock = Stock::updateOrCreate(
            ['product_id' => $this->product->id],
            [
                'quantity' => $this->realQuantity,
            ]);
        $stock->increment('quantity', $validatedData['quantity']);
        StockMovement::create(
            ['product_id' => $this->product->id,
                'quantity' => $validatedData['quantity'],
                'stock_movement_type_id' => $validatedData['type'],
            ]);

        return true;
    }

    public function rules()
    {
        return [
            'quantity' => 'required',
            'type' => 'required',
        ];

    }

    public function validationAttributes()
    {
        return [
            'quantity' => strtolower(__('admin.stocks.forms.quantity.attribute')),
            'type' => strtolower(__('admin.stocks.forms.type.attribute')),
        ];
    }
}
