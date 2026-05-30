<div class="space-y-6">
    <div>
        <flux:heading size="lg">{{__('client.products.delete-title')}}</flux:heading>
        <flux:text class="mt-2">
            {{__('client.products.delete-reversed')}}
        </flux:text>
    </div>
    <div class="flex gap-2">
        <flux:spacer />
        <flux:modal.close>
            <flux:button variant="ghost">{{__('client.commons.buttons.cancel')}}</flux:button>
        </flux:modal.close>
        <flux:button wire:click="delete" type="submit" variant="danger">{{__('client.commons.buttons.delete')}}</flux:button>
    </div>
</div>
