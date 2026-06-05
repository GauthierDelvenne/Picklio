<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.stock.index')}}">{{__('commons.pageName.admin.admin.stocks')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->product->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex flex-col gap-4 justify-between content-center items-start sm:flex-row">
        <flux:heading size="xl"
                      level="2">{{__('admin.stocks.sell-by')}} {{$this->product->account->user->name}}</flux:heading>
        <div class="flex flex-col gap-4 md:flex-row">
            <flux:modal.trigger name="update-stock">
                <flux:button variant="primary">{{__('admin.commons.buttons.update')}}</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="update-product">
                <flux:button variant="primary">{{__('admin.commons.buttons.edit')}}</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="delete-product">
                <flux:button variant="danger">{{__('admin.commons.buttons.inactive')}}</flux:button>
            </flux:modal.trigger>
        </div>
    </section>
    <flux:separator variant="subtle"/>
    <div class="flex flex-col gap-10 xl:flex-row">
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.stocks.product-detail')}}</flux:heading>
            <div class="mt-2 flex flex-col gap-10 sm:flex-row">
                <div class="max-w-50 min-w-50 h-50 rounded">
                    @if($product->picture_path == 'images/missing-product.webp')
                        <img src="{{asset($product->picture_path)}}" alt="{{$product->name}}" class="w-full h-full object-cover rounded">
                    @else
                        <img
                            src="{{ $product->pictureUrl(600) }}"
                            srcset="{{ $product->pictureUrl(300) }} 300w, {{ $product->pictureUrl(600) }} 600w,{{ $product->pictureUrl(900) }} 900w"
                            sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                            alt="{{$product->name}}" class="w-full h-full object-cover rounded">
                    @endif
                </div>
                <div class="flex flex-col gap-5 max-w-md">

                    <flux:text><span class="font-bold">{{__('admin.stocks.name')}} :</span> {{$this->product->name}}
                    </flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.stocks.description')}} :</span> {{$this->product->description}}
                    </flux:text>
                    <flux:text><span
                            class="font-bold">{{__('admin.stocks.category')}} :</span> {{__('admin.stocks.categories.'.$product->product_category_id)}}
                    </flux:text>
                </div>
            </div>
        </flux:card>
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.stocks.stock-status')}}</flux:heading>
            <div class="flex flex-col gap-5 mt-2">
                <flux:text><span class="font-bold">{{__('words.there-is')}}</span> {{$product->stock->quantity}}
                    {{__('words.product')}}
                    {{__('words.on')}} {{$product->productCategory->capacity}}
                </flux:text>
                @if($this->product->is_active)
                    <flux:text><span
                            class="font-bold">{{__('admin.stocks.product-status')}} :</span> {{__('admin.stocks.online')}}
                    </flux:text>
                @else
                    <flux:text><span
                            class="font-bold">{{__('admin.stocks.product-status')}} :</span> {{__('admin.stocks.offline')}}
                    </flux:text>
                @endif
            </div>
        </flux:card>
    </div>
    <flux:card>
        <flux:heading size="xl">{{__('admin.stocks.product-value')}}</flux:heading>
        <div class="flex flex-col gap-5 mt-2">
            <flux:text><span
                    class="font-bold">{{__('admin.stocks.product-price')}} :</span> {{$this->product->priceFormatted}}
            </flux:text>
            @if(!empty($this->product->percentage))
                <flux:text><span class="font-bold">{{__('admin.stocks.product-percentage')}} :</span>
                    {{$this->product->percentage}}%
                </flux:text>
                <flux:text><span
                        class="font-bold">{{__('words.of')}}</span> {{\Carbon\Carbon::parse($this->product->start_at)->format('Y-m-d')}}
                    <span
                        class="font-bold">{{__('words.at')}}</span> {{\Carbon\Carbon::parse($this->product->end_at)->format('Y-m-d')}}
                </flux:text>
            @endif
        </div>
    </flux:card>
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
                <flux:table.column>{{__('admin.orders.date')}}</flux:table.column>
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
                            {{__('admin.stocks.forms.type.'.$product->type)}}
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
    <flux:modal name="update-product" class="md:w-96">
        <x-admin.modals.stock.update-product/>
    </flux:modal>
    <flux:modal name="update-stock" class="md:w-96">
        <x-admin.modals.stock.update-stock/>
    </flux:modal>
    <flux:modal name="delete-product" class="md:w-96">
        <x-admin.modals.stock.delete-product/>
    </flux:modal>
</flux:main>
