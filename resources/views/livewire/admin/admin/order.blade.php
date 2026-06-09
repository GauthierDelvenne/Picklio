<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.order.index')}}">{{__('commons.pageName.admin.admin.order')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>#{{$this->order->code}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex flex-col gap-4 justify-between content-center items-start sm:flex-row">
        <flux:heading size="xl" level="2">{{__('admin.orders.order-by')}} #{{$this->order->code}}</flux:heading>
        @if($this->order->order_status_id == \App\Models\OrderStatus::INWAIT)
        <div class="flex flex-col gap-4 md:flex-row">
            <flux:button wire:click="endOrder"
                         variant="primary">{{__('admin.orders.end-order')}}
            </flux:button>
            <flux:modal.trigger name="delete-order">
                <flux:button variant="danger">{{__('admin.orders.delete-order')}}</flux:button>
            </flux:modal.trigger>
        </div>
        @endif
    </section>
    <flux:separator variant="subtle"/>
    <div class="flex flex-col gap-10 md:flex-row">
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.orders.info-client')}}</flux:heading>
            <div class="mt-2 flex gap-10">
                <div class="flex flex-col gap-5">
                    <flux:text> <span
                            class="font-bold">{{__('admin.orders.name')}} :</span> {{$this->order->account->firstname}} {{$this->order->account->lastname}}</flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.orders.phone')}} :</span> {{$this->order->account->phone}}</flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.orders.email')}} :</span> {{$this->order->account->email}}</flux:text>
                </div>
            </div>
        </flux:card>
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.orders.info-order')}}</flux:heading>
            <div class="mt-2 flex gap-10">
                <div class="flex flex-col gap-5">
                    <flux:text><span
                            class="font-bold">{{__('admin.orders.date')}} :</span> {{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('d M Y')}}
                    </flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.orders.slot')}} :</span> {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
                    </flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.orders.total')}} :</span> {{$order->priceFormatted}}
                    </flux:text>
                </div>
            </div>
        </flux:card>
    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('admin.orders.product')}}</flux:heading>
        </div>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{__('admin.orders.product-name')}}</flux:table.column>
                <flux:table.column>{{__('admin.orders.product-quantity')}}</flux:table.column>
                <flux:table.column>{{__('admin.orders.product-price')}}</flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->order->orderItems as $orderItem)
                    <flux:table.row>
                        <flux:table.cell>
                            {{$orderItem->product->name}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$orderItem->quantity}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$orderItem->priceFormatted}}
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
    </div>
    <flux:modal name="delete-order" class="md:w-96">
        <x-admin.modals.order.delete-order/>
    </flux:modal>
</flux:main>
