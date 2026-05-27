<flux:main>
    <section class="flex justify-between gap-10 mb-12">
        <flux:heading size="xl" level="2">{{__('commons.pageName.admin.admin.stocks')}}</flux:heading>

    </section>
    <div class="flex flex-col justify-between gap-10 mb-12 md:flex-row">
                <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('admin.stocks.totals')}}</flux:heading>
            <flux:text class="mt-2">{{$this->products->total()}} {{__('words.product')}}</flux:text>
        </flux:card>
                <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('admin.stocks.very-low-stock')}}
            </flux:heading>
            <flux:text class="mt-2">{{$this->veryLowStockCount()}} {{__('words.product')}}</flux:text>
        </flux:card>
                <flux:card class="w-full">
            <flux:heading class="flex items-center gap-2">{{__('admin.stocks.low-stock')}}
            </flux:heading>
            <flux:text class="mt-2">{{$this->lowStockCount()}} {{__('words.product')}}</flux:text>
        </flux:card>

    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex flex-col gap-4 justify-between lg:flex-row">
            <flux:heading size="l">{{__('commons.pageName.admin.admin.stocks')}}</flux:heading>
            <div class="mb-4 flex flex-col gap-4 sm:flex-row sm:flex-wrap md:flex-nowrap">
                <flux:select wire:model.live="merchant" class="sm:w-5/12">
                    <flux:select.option value="">{{__('admin.stocks.choose-merchant')}}</flux:select.option>
                    @foreach($this->merchants as $key => $merchant)
                        <flux:select.option
                            value="{{$merchant->id}}">{{$merchant->user->name}}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select wire:model.live="category" class="sm:w-5/12">
                    <flux:select.option
                        value="">{{__('client.products.forms.category.placeholder')}}</flux:select.option>
                    @foreach($this->categories as $key => $categories)
                        <flux:select.option
                            value="{{$categories->id}}">{{__('admin.stocks.categories.'.$categories->id)}}</flux:select.option>
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
                <flux:table.column sortable :sorted="$sortBy === 'products.name'" :direction="$sortDirection"
                                   wire:click="sort('products.name')">{{__('admin.stocks.name')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.stocks.name-merchant')}}</flux:table.column>
                <flux:table.column>{{__('client.products.forms.category.label')}}</flux:table.column>
                <flux:table.column>{{__('client.products.status')}}</flux:table.column>
                <flux:table.column>{{__('admin.stocks.forms.quantity.label')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->products as $product)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.stock.show', $product->id) }}"
                               class="text-accent hover:text-accent-content">
                                {{$product->name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->account->user->name}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{__('client.products.categories.'.$product->product_category_id)}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge
                                :color=" $product->stock->isVeryLowStock($product->productCategory->capacity) ? 'red' : ($product->stock->isLowStock($product->productCategory->capacity) ? 'yellow' : 'green')">
                                {{$product->stock->isVeryLowStock($product->productCategory->capacity) ? 'Critique' : ($product->stock->isLowStock($product->productCategory->capacity) ? 'Bas' : 'Bon')}}                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->stock->quantity}}/{{$product->productCategory->capacity}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal class="text-accent hover:text-accent-content"/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.stock.show', $product->id)}}">
                                        <flux:menu.item
                                            class="text-accent hover:text-accent-content">{{__('client.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="delete({{$product}})"
                                                    class="text-accent hover:text-accent-content"
                                                    wire:confirm="{{__('client.products.delete-confirm', ['name' => $product->user_name])}}">{{__('client.commons.buttons.delete')}}</flux:menu.item>
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
    <div class="flex justify-between gap-10 mt-12">
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">Dernière activité</flux:heading>
            @forelse($this->lastUpdateProductsActivities as $lastUpdateProductsActivity)
                <div class="mt-2 flex gap-4 justify-between">
                    <a href="{{ route('admin.stock.show', $lastUpdateProductsActivity->id) }}">
                        <flux:text class="mt-2 hover:text-(--color-accent-content)">
                            {{$lastUpdateProductsActivity->account->user->name}}
                            {{__('words.update')}}
                            {{$lastUpdateProductsActivity->name}}
                        </flux:text>
                    </a>
                    <flux:text
                        class="mt-2">    {{ \Carbon\Carbon::parse($lastUpdateProductsActivity->updated_at)->diffForHumans() }}
                    </flux:text>
                </div>
            @empty
                <flux:text class="mt-2">{{__('client.commons.empty')}}</flux:text>
            @endforelse
        </flux:card>
    </div>
</flux:main>
