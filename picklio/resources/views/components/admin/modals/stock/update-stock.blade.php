<div>
    <form wire:submit.prevent="updateStock" class="flex flex-col gap-2">
        <flux:field>
            <flux:label>{{__('admin.stocks.forms.quantity.label')}}</flux:label>
            <flux:description>{{__('admin.stocks.forms.quantity.description', ['quantity' => $this->formStock->realQuantity])}}</flux:description>
            <flux:input wire:model="formStock.quantity"/>
            <flux:error name="formStock.quantity"/>
        </flux:field>
        <flux:select wire:model="formStock.type"
                     label="Raison du changement">
            <flux:select.option
                value="{{\App\Models\StockMovement::TYPE_SUPPLY}}">{{__('admin.stocks.forms.type.supply')}}</flux:select.option>
            <flux:select.option
                value="{{\App\Models\StockMovement::TYPE_ADJUSTMENT}}">{{__('admin.stocks.forms.type.adjustment')}}</flux:select.option>
            <flux:select.option
                value="{{\App\Models\StockMovement::TYPE_SALE}}">{{__('admin.stocks.forms.type.sale')}}</flux:select.option>
        </flux:select>
        <flux:button type="submit" variant="primary" class="mt-2">
            {{__('admin.commons.buttons.update')}}
        </flux:button>
    </form>

</div>
