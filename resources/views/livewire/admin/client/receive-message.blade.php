<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('client.message.index')}}">{{__('commons.pageName.admin.client.message')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->receiveMessage->title}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <flux:separator variant="subtle"/>
    <flux:card class="grow">
        <flux:heading size="xl">{{__('admin.messages.title')}} {{$this->receiveMessage->sender->user->name}}</flux:heading>
        <div class="flex flex-col gap-5 mt-2">
            <flux:text>
                <span
                    class="font-bold">{{__('admin.messages.form.title.placeholder')}} :</span> {{$this->receiveMessage->title}}
            </flux:text>
            <flux:text>
                <span
                    class="font-bold">{{__('admin.messages.form.description.placeholder')}} :</span> {{$this->receiveMessage->description}}
            </flux:text>
        </div>
    </flux:card>
    <div class="flex flex-col gap-10 sm:flex-row">
        <flux:button wire:click="readMessage"
                     variant="primary">{{__('client.commons.buttons.read')}}</flux:button>
    </div>
</flux:main>
