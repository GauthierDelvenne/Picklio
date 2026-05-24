<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.stock.index')}}">{{__('commons.pageName.admin.admin.stocks')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->product->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex justify-between content-center items-center">
        <flux:heading size="xl" level="2">{{__('admin.stocks.sell-by')}} {{$this->product->account->user->name}}</flux:heading>
        <div class="flex gap-10">
            <flux:modal.trigger name="update-stock">
                <flux:button variant="primary">{{__('admin.commons.buttons.update')}}</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="update-product">
                <flux:button variant="primary">{{__('admin.commons.buttons.edit')}}</flux:button>
            </flux:modal.trigger>
        </div>
    </section>
    <flux:separator variant="subtle"/>
    <div class="flex gap-10">
        <flux:card class="grow">
            <flux:heading size="xl">{{__('admin.stocks.product-detail')}}</flux:heading>
            <div class="mt-2 flex gap-10">
                <div class="w-50 h-50 rounded">
                    <img
                        src="{{ $product->pictureUrl(600) }}"
                        srcset="{{ $product->pictureUrl(300) }} 300w, {{ $product->pictureUrl(600) }} 600w,{{ $product->pictureUrl(900) }} 900w"
                        sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                        alt="{{$product->name}}" class="w-full h-full object-cover rounded">
                </div>
                <div class="flex flex-col gap-5">

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
    <flux:modal name="update-product" class="md:w-96">
        <x-admin.modals.stock.update-product/>
    </flux:modal>
    <flux:modal name="update-stock" class="md:w-96">
        <x-admin.modals.stock.update-stock/>
    </flux:modal>
</flux:main>
