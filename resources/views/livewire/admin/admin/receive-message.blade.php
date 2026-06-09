<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.message.index')}}">{{__('commons.pageName.admin.admin.messages')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->receiveMessage->title}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="flex justify-between content-center items-center">
        <flux:heading size="xl">{{__('admin.messages.merchant')}}</flux:heading>
        <flux:modal.trigger name="delete-message">
            <flux:button variant="danger">{{__('admin.commons.buttons.delete')}}</flux:button>
        </flux:modal.trigger>
    </div>
    <flux:separator variant="subtle"/>
    <div class="flex flex-col gap-10">
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.messages.title')}} {{$this->receiveMessage->sender->user->name}}</flux:heading>
            <div class="mt-2 flex gap-10">
                <div class="flex flex-col gap-5">

                    <flux:text><span
                            class="font-bold">{{__('admin.messages.user-title')}} :</span> {{$this->receiveMessage->title}}
                    </flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.messages.user-description')}} :</span> {{$this->receiveMessage->description}}
                    </flux:text>
                </div>
            </div>
        </flux:card>
    </div>
    <div class="flex flex-col gap-10 sm:flex-row">
        <flux:button wire:click="readMessage"
                     variant="primary">{{__('client.commons.buttons.read')}}</flux:button>
    </div>
    <flux:modal name="delete-message" class="md:w-96">
        <x-admin.modals.message.delete-message/>
    </flux:modal>
</flux:main>
