<?php

namespace App\Livewire\form\admin\admin\setting;

use App\Models\Warehouse;
use Livewire\Component;
use Livewire\Form;

class UpdateWarehouseForm extends Form
{
    public $warehouse;

    public $name;

    public $phone;

    public $email;

    public $address;

    public $postal_code;

    public $country;

    public $opening_time;

    public $closing_time;

    public function __construct(Component $component, $propertyName)
    {
        parent::__construct($component, $propertyName);
        $this->warehouse = Warehouse::first();
        $this->setProperties();
    }

    public function setProperties()
    {
        if (!$this->warehouse) {
            return;
        }
        $this->name = $this->warehouse->name ?? null;
        $this->phone = $this->warehouse->phone ?? null;
        $this->email = $this->warehouse->email ?? null;
        $this->address = $this->warehouse->address ?? null;
        $this->postal_code = $this->warehouse->postal_code ?? null;
        $this->country = $this->warehouse->country ?? null;
        $this->opening_time = $this->warehouse->opening_time ?? null;
        $this->closing_time = $this->warehouse->closing_time ?? null;
    }

    public function update()
    {
        $validatedData = $this->validate();
        Warehouse::updateOrCreate([
            'id' => $this->warehouse->id,
        ],
            $validatedData);
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'opening_time' => 'nullable',
            'closing_time' => 'nullable|after:opening_time',
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => strtolower(__('admin.settings.warehouse.forms.name.attribute')),
            'phone' => strtolower(__('admin.settings.warehouse.forms.phone.attribute')),
            'email' => strtolower(__('admin.settings.warehouse.forms.email.attribute')),
            'address' => strtolower(__('admin.settings.warehouse.forms.address.attribute')),
            'postal_code' => strtolower(__('admin.settings.warehouse.forms.postal_code.attribute')),
            'country' => strtolower(__('admin.settings.warehouse.forms.country.attribute')),
            'opening_time' => strtolower(__('admin.settings.warehouse.forms.opening_time.attribute')),
            'closing_time' => strtolower(__('admin.settings.warehouse.forms.closing_time.attribute')),
        ];
    }
}
