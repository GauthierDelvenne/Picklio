<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('client.stock.index')}}">{{__('commons.pageName.admin.client.stocks')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->product->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex justify-between content-center items-center">
        <flux:heading size="xl" level="2">{{__('client.products.edit')}}</flux:heading>
        <flux:modal.trigger name="delete-product">
            <flux:button variant="danger">{{__('client.commons.buttons.delete')}}</flux:button>
        </flux:modal.trigger>
    </section>
    <flux:separator variant="subtle"/>
    <x-client.modals.stock.form submit="update" button="{{__('client.commons.buttons.edit')}}"/>
    <flux:modal name="delete-product" class="md:w-96">
        <x-client.modals.stock.delete-product/>
    </flux:modal>
</flux:main>
