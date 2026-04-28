<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.merchant.index')}}">{{__('commons.pageName.admin.admin.merchants')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->account->user->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <div class="flex justify-between content-center items-center">
        <flux:heading size="xl">{{__('admin.merchants.edit')}}</flux:heading>
        <flux:modal.trigger name="delete-merchant">
            <flux:button variant="danger">{{__('admin.commons.buttons.delete')}}</flux:button>
        </flux:modal.trigger>
    </div>
    <flux:separator variant="subtle"/>
    <x-admin.modals.merchant.form submit="update" button="{{__('admin.commons.buttons.edit')}}"/>
    <flux:modal name="delete-merchant" class="md:w-96">
        <x-admin.modals.merchant.delete-merchant/>
    </flux:modal>
</flux:main>
