<flux:main>
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.message.index')}}">{{__('commons.pageName.admin.admin.message')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->message->title}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex justify-between content-center items-center">
        <flux:heading size="xl" level="2">{{__('admin.messages.edit')}}</flux:heading>
        <flux:modal.trigger name="delete-message">
            <flux:button variant="danger">{{__('admin.commons.buttons.delete')}}</flux:button>
        </flux:modal.trigger>
    </section>
    <flux:separator variant="subtle"/>
    <x-admin.modals.message.form submit="update" button="{{__('admin.commons.buttons.edit')}}"/>
    <flux:modal name="delete-message" class="md:w-96">
        <x-admin.modals.message.delete-message/>
    </flux:modal>
</flux:main>
