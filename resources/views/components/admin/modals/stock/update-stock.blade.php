<form wire:submit.prevent="updateStock" class="flex flex-col gap-2">

    <flux:field>
        <flux:label>
            {{__('admin.stocks.forms.quantity.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:description>
            {{__('admin.stocks.forms.quantity.description', ['quantity' => $this->formStock->realQuantity])}}
        </flux:description>
        <flux:input wire:model="formStock.quantity"/>
        <flux:error name="formStock.quantity"/>
    </flux:field>

    <flux:field>
        <flux:label>
            {{__('admin.stocks.forms.type.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:select wire:model="formStock.type">
            <flux:select.option value="{{ \App\Models\StockMovementType::TYPE_SUPPLY }}">
                {{__('admin.stocks.forms.type.supply')}}
            </flux:select.option>
            <flux:select.option value="{{ \App\Models\StockMovementType::TYPE_ADJUSTMENT }}">
                {{__('admin.stocks.forms.type.adjustment')}}
            </flux:select.option>
            <flux:select.option value="{{ \App\Models\StockMovementType::TYPE_SALE }}">
                {{__('admin.stocks.forms.type.sale')}}
            </flux:select.option>
        </flux:select>
        <flux:error name="formStock.type"/>
    </flux:field>

    <flux:button type="submit" variant="primary" class="mt-2">
        {{__('admin.commons.buttons.update')}}
    </flux:button>

</form>
