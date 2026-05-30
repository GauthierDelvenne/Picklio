<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.message.index')}}">{{__('commons.pageName.admin.admin.messages')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->suggestMessage->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="flex justify-between content-center items-center">
        <flux:heading size="xl">{{__('admin.messages.user-message')}}</flux:heading>
        <flux:modal.trigger name="delete-message">
            <flux:button variant="danger">{{__('admin.commons.buttons.delete')}}</flux:button>
        </flux:modal.trigger>
    </div>
    <flux:separator variant="subtle"/>
    <div class="flex flex-col gap-10">
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.messages.information')}}</flux:heading>
            <div class="mt-2 flex gap-10">
                <div class="flex flex-col gap-5">

                    <flux:text><span
                            class="font-bold">{{__('admin.messages.user-name')}} :</span> {{$this->suggestMessage->name}}
                    </flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.messages.user-email')}} :</span> {{$this->suggestMessage->email}}
                    </flux:text>
                </div>
            </div>
        </flux:card>
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.messages.suggestMessage')}}</flux:heading>
            <div class="flex flex-col gap-5 mt-2">
                <flux:text><span
                        class="font-bold">{{__('admin.messages.user-merchantSuggest')}} :</span> {{$this->suggestMessage->merchantSuggest}}
                </flux:text>
                <flux:text><span
                        class="font-bold">{{__('admin.messages.user-productSuggest')}} :</span> {{$this->suggestMessage->productSuggest}}
                </flux:text>
            </div>
        </flux:card>
    </div>
    <div class="flex flex-col gap-10 sm:flex-row">
        <flux:button wire:click="validateMessage"
                     variant="primary">{{__('client.commons.buttons.validate')}}</flux:button>
        <flux:button wire:click="refuseMessage" variant="danger">{{__('client.commons.buttons.refuse')}}</flux:button>
    </div>
    <flux:modal name="delete-message" class="md:w-96">
        <x-admin.modals.message.delete-message/>
    </flux:modal>
</flux:main>
