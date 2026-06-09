<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('client.stock.index')}}">{{__('commons.pageName.admin.client.stocks')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->product->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex justify-between content-center items-center">
        <flux:heading size="xl" level="2">{{__('client.products.edit')}}</flux:heading>
        <flux:modal.trigger name="delete-product">
            <flux:button variant="danger">{{__('client.commons.buttons.inactive')}}</flux:button>
        </flux:modal.trigger>
    </section>
    <flux:separator variant="subtle"/>
    <x-client.modals.stock.form submit="update" button="{{__('client.commons.buttons.edit')}}"/>
    <flux:modal name="delete-product" class="md:w-96">
        <x-client.modals.stock.delete-product/>
    </flux:modal>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex flex-col gap-4 justify-between sm:flex-row">
            <flux:heading size="l">{{__('client.products.history')}}</flux:heading>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{__('client.products.forms.name.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.orders.product-quantity')}}</flux:table.column>
                <flux:table.column>{{__('admin.stocks.forms.type.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.orders.stock-date')}}</flux:table.column>
            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->stockMouvements as $product)
                    <flux:table.row>
                        <flux:table.cell>
                            {{$this->product->name}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->quantity}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{__('admin.stocks.forms.type.'.$product->stock_movement_type_id)}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{\Carbon\Carbon::parse($product->created_at)->format('Y-m-d')}}
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('client.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
        <flux:pagination :paginator="$this->stockMouvements" class="flex-wrap"/>
    </div>
</flux:main>
