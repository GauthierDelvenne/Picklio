<flux:main>
    <section class="flex justify-between gap-10 mb-12">
        <flux:heading size="xl" level="2">{{__('commons.pageName.admin.admin.orders')}}</flux:heading>

    </section>
    <div class="flex justify-between gap-10 mb-12">
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.orders.today-order')}}</flux:heading>
            <flux:text class="mt-2">{{$this->todayOrder}}</flux:text>
        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.orders.inWait-order')}}</flux:heading>
            <flux:text class="mt-2">{{$this->inWaitOrder}}</flux:text>
        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.orders.complete-order')}}</flux:heading>
            <flux:text class="mt-2">{{$this->finishOrder}}</flux:text>
        </flux:card>

    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('admin.orders.progress-order')}}</flux:heading>
            <div class="mb-4 flex gap-10">
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass"
                            placeholder="{{__('client.commons.search')}}"/>
            </div>
        </div>

        <flux:table :paginate="$this->orders">
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'code'" :direction="$sortDirection"
                                   wire:click="sort('code')">{{__('admin.orders.code')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.orders.client-name')}}
                </flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'pickup_date'" :direction="$sortDirection"
                                   wire:click="sort('pickup_date')">{{__('admin.orders.date')}}</flux:table.column>
                <flux:table.column>{{__('admin.orders.status')}}</flux:table.column>
                <flux:table.column>{{__('admin.orders.total')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->orders as $order)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.order.show', $order->uuid) }}"
                               class="hover:text-(--color-accent-content)">
                                #{{$order->code}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            <a href="{{ route('admin.order.show', $order->uuid) }}"
                               class="hover:text-(--color-accent-content)">
                                {{$order->account->firstname}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('d M :')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge
                                color="orange">
                                {{__('admin.orders.in-progress')}}
                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$order->priceFormatted}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.order.show', $order->uuid)}}">
                                        <flux:menu.item
                                            class="hover:text-(--color-accent-content)">{{__('client.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="delete('{{$order->uuid}}')"
                                                    class="hover:text-(--color-accent-content)"
                                                    wire:confirm="{{__('admin.orders.delete-confirm', ['name' => $order->account->firstname.' '.$order->account->lastname])}}">{{__('client.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell>
                            {{__('admin.commons.empty')}}
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse

            </flux:table.rows>
        </flux:table>
    </div>

    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl mt-8">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('admin.orders.history-order')}}</flux:heading>
            <div class="mb-4 flex gap-10">
                <flux:input wire:model.live.debounce.500ms="historySearch" icon="magnifying-glass"
                            placeholder="{{__('client.commons.search')}}"/>
            </div>
        </div>

        <flux:table :paginate="$this->historyOrders">
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'code'" :direction="$sortDirection"
                                   wire:click="sort('code')">{{__('admin.orders.code')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.orders.client-name')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.orders.date')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.orders.status')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.orders.total')}}
                </flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->historyOrders as $order)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.order.show', $order->uuid) }}"
                               class="hover:text-(--color-accent-content)">
                                #{{$order->code}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            <a href="{{ route('admin.order.show', $order->uuid) }}"
                               class="hover:text-(--color-accent-content)">
                                {{$order->account->firstname}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('d M :')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge
                                color="green">
                                {{__('admin.orders.end')}}

                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$order->priceFormatted}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.order.show', $order->uuid)}}">
                                        <flux:menu.item
                                            class="hover:text-(--color-accent-content)">{{__('client.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                </flux:menu>
                            </flux:dropdown>
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
</flux:main>
