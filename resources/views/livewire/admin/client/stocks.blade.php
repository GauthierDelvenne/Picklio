<flux:main>
    <section class="flex flex-col justify-between gap-10 mb-12 sm:flex-row">
        <flux:heading size="xl" level="2">{{__('commons.pageName.admin.client.stocks')}}</flux:heading>
        <flux:modal.trigger name="product-add">
            <flux:button variant="primary">
                <flux:icon.plus/>
                {{__('client.products.add')}}
            </flux:button>
        </flux:modal.trigger>

    </section>
    <div class="flex flex-col justify-between gap-10 mb-12 md:flex-row">
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('client.products.total-product')}}</flux:heading>
            <flux:text class="mt-2">{{$this->products->total()}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('client.products.bestseller-product')}}</flux:heading>
            <flux:text
                class="mt-2">{{!empty($this->bestSeller) ? $this->bestSeller['product']->name : __('admin.commons.empty')}}</flux:text>
        </flux:card>
        <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('client.products.lowStock-product')}}</flux:heading>
            <flux:text class="mt-2">{{$this->veryLowStockCount()}}</flux:text>
        </flux:card>

    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex flex-col gap-4 justify-between sm:flex-row">
            <flux:heading size="l">{{__('commons.pageName.admin.admin.stocks')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="category" class="sm:w-5/12">
                    <flux:select.option
                        value="">{{__('client.products.forms.category.placeholder')}}</flux:select.option>
                    @foreach($this->categories as $key => $categories)
                        <flux:select.option
                            value="{{$categories->id}}">{{__('client.products.categories.'.$categories->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select wire:model.live="statu" class="sm:w-5/12">
                    <flux:select.option
                        value="">{{__('admin.stocks.status.title')}}</flux:select.option>
                    @foreach($this->status as $key => $statu)
                        <flux:select.option
                            value="{{$statu}}">{{__('admin.stocks.status.'.$statu)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass" class="sm:w-5/12"
                            placeholder="{{__('client.commons.search')}}"/>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>{{__('client.products.image')}}</flux:table.column>
                <flux:table.column sortable :sorted="$sortBy === 'products.name'" :direction="$sortDirection"
                                   wire:click="sort('products.name')">{{__('client.products.forms.name.placeholder')}}
                </flux:table.column>
                <flux:table.column>{{__('client.products.forms.category.label')}}</flux:table.column>
                <flux:table.column>{{__('client.products.status')}}</flux:table.column>
                <flux:table.column>{{__('client.products.stock')}}</flux:table.column>
                <flux:table.column>{{__('client.products.forms.price.label')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->products as $product)
                    <flux:table.row>
                        <flux:table.cell>
                            <div class="w-9 h-9 rounded">
                                @if($product->picture_path == 'images/missing-product.webp')
                                    <img src="{{asset($product->picture_path)}}" alt="{{$product->name}}"
                                         class="w-full h-full object-cover rounded">
                                @else
                                    <img
                                        src="{{ $product->pictureUrl(600) }}"
                                        srcset="{{ $product->pictureUrl(300) }} 300w, {{ $product->pictureUrl(600) }} 600w,{{ $product->pictureUrl(900) }} 900w"
                                        sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                                        alt="{{$product->name}}" class="w-full h-full object-cover rounded">
                                @endif
                            </div>
                        </flux:table.cell>
                        <flux:table.cell>
                            <a href="{{ route('client.stock.show', $product->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$product->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{__('client.products.categories.'.$product->product_category_id)}}
                        </flux:table.cell>
                        <flux:table.cell>
                            @if($product->is_active == 0)
                                <flux:badge color="grey">{{__('admin.merchants.status.2')}}</flux:badge>
                            @else
                                <flux:badge
                                    :color=" $product->stock->isVeryLowStock($product->productCategory->capacity) ? 'red' : ($product->stock->isLowStock($product->productCategory->capacity) ? 'yellow' : 'green')">
                                    {{$product->stock->isVeryLowStock($product->productCategory->capacity) ? 'Critique' : ($product->stock->isLowStock($product->productCategory->capacity) ? 'Bas' : 'Bon')}}                            </flux:badge>
                            @endif
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->stock->quantity}}/{{$product->productCategory->capacity}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->priceFormatted}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('client.stock.show', $product->id)}}"
                                       class="text-accent hover:text-accent-content">
                                        <flux:menu.item>{{__('client.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    @if($product->is_active == 1)

                                    <flux:menu.item wire:click="delete({{$product}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('client.products.delete-confirm', ['name' => $product->user_name])}}">{{__('client.commons.buttons.inactive')}}</flux:menu.item>
                                    @endif
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
        <flux:pagination :paginator="$this->products" class="flex-wrap"/>
    </div>
    <flux:modal name="product-add" class="md:w-96">
        <x-client.modals.stock.form submit="create" :button="__('client.commons.buttons.add')"/>
    </flux:modal>
</flux:main>
