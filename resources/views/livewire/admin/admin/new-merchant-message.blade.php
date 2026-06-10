<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.message.index')}}">{{__('commons.pageName.admin.admin.messages')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->newMerchantMessage->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="flex justify-between content-center items-center">
        <flux:heading size="xl">{{__('admin.messages.user-message')}}</flux:heading>
        <div>
        <flux:modal.trigger name="delete-message">
            <flux:button variant="danger">{{__('admin.commons.buttons.delete')}}</flux:button>
        </flux:modal.trigger>
        <flux:button variant="primary" href="mailto:{{$this->newMerchantMessage->email}}">
            {{__('admin.messages.answerMail')}}
        </flux:button>
        </div>
    </div>
    <flux:separator variant="subtle"/>
    <div class="flex flex-col gap-10">
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.messages.information-merchant')}}</flux:heading>
            <div class="mt-2 flex flex-col gap-4">
                <flux:text><span
                        class="font-bold">{{__('admin.messages.user-name')}} :</span> {{$this->newMerchantMessage->firstname}} {{$this->newMerchantMessage->lastname}}
                </flux:text>
                <flux:text><span
                        class="font-bold">{{__('admin.messages.shop-name')}} :</span> {{$this->newMerchantMessage->name}}
                </flux:text>
                <flux:text><span
                        class="font-bold">{{__('admin.messages.user-email')}} :</span><a href="mailto:{{$this->newMerchantMessage->email}}"> {{$this->newMerchantMessage->email}}</a>
                </flux:text>
                <flux:text><span
                        class="font-bold">{{__('admin.messages.user-address')}} :</span> {{$this->newMerchantMessage->address}} {{$this->newMerchantMessage->postal_code}} {{$this->newMerchantMessage->country}}
                </flux:text>
                <flux:text><span
                        class="font-bold">{{__('admin.messages.user-description')}} :</span> {{$this->newMerchantMessage->description}}
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
