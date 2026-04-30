<flux:main>
    <div class="flex justify-between gap-10 mb-12">
        <flux:heading size="xl" level="1">{{__('commons.pageName.admin.admin.stocks')}}</flux:heading>

    </div>
    <div class="flex justify-between gap-10 mb-12">
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.stocks.totals')}}</flux:heading>
            <flux:text class="mt-2">{{$this->products->total()}}</flux:text>
        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.stocks.very-low-stock')}}
            </flux:heading>
            <flux:text class="mt-2">{{$this->veryLowStockCount()}}</flux:text>
        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.stocks.low-stock')}}
            </flux:heading>
            <flux:text class="mt-2">{{$this->lowStockCount()}}</flux:text>
        </flux:card>

    </div>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('commons.pageName.admin.admin.stocks')}}</flux:heading>
            <div class="mb-4 flex gap-10">
                <flux:select wire:model.live="merchant">
                    <flux:select.option value="">{{__('admin.stocks.choose-merchant')}}</flux:select.option>
                    @foreach($this->merchants as $key => $merchant)
                        <flux:select.option
                            value="{{$merchant->id}}">{{$merchant->user->name}}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select wire:model.live="category">
                    <flux:select.option
                        value="">{{__('client.products.forms.category.placeholder')}}</flux:select.option>
                    @foreach($this->categories as $key => $categories)
                        <flux:select.option
                            value="{{$categories->id}}">{{__('admin.stocks.categories.'.$categories->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass"
                            placeholder="{{__('client.commons.search')}}"/>
            </div>
        </div>

        <flux:table :paginate="$this->products">
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'products.name'" :direction="$sortDirection"
                                   wire:click="sort('products.name')">{{__('admin.stocks.name')}}
                </flux:table.column>
                <flux:table.column>Nom du commerçant</flux:table.column>
                <flux:table.column>{{__('client.products.forms.category.label')}}</flux:table.column>
                <flux:table.column>{{__('client.products.status')}}</flux:table.column>
                <flux:table.column>{{__('admin.stocks.forms.quantity.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.merchants.form.address.label')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->products as $product)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.stock.show', $product->id) }}" class="hover:text-(--color-accent-content)">
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
                                :color=" $product->stock->isVeryLowStock ? 'red' : ($product->stock->isLowStock ? 'yellow' : 'green')">
                                {{$product->stock->isVeryLowStock ? 'Critique' : ($product->stock->isLowStock ? 'Bas' : 'Bon')}}                            </flux:badge>
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->stock->quantity}}/{{$product->productCategory->capacity}}
                        </flux:table.cell>
                        <flux:table.cell>
                            {{$product->account->address}}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.stock.show', $product->id)}}">
                                        <flux:menu.item class="hover:text-(--color-accent-content)">{{__('client.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="delete({{$product}})" class="hover:text-(--color-accent-content)"
                                                    wire:confirm="{{__('client.products.delete-confirm', ['name' => $product->user_name])}}">{{__('client.commons.buttons.delete')}}</flux:menu.item>
                                </flux:menu>
                            </flux:popover>
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
    <div class="flex justify-between gap-10 mt-12">
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">Dernière activité</flux:heading>
            @forelse($this->lastAddProductsActivities as $lastAddProductsActivity)
                <div class="mt-2 flex gap-4 justify-between">
                    <a href="{{ route('admin.stock.show', $product->id) }}">
                        <flux:text class="mt-2 hover:text-(--color-accent-content)">
                            {{$lastAddProductsActivity->account->user->name}}
                            {{__('words.add')}} {{$lastAddProductsActivity->name}}
                        </flux:text>
                    </a>
                    <flux:text class="mt-2">    {{ \Carbon\Carbon::parse($product->updated_at)->diffForHumans() }}
                    </flux:text>
                </div>
            @empty
                <flux:text class="mt-2">{{__('client.commons.empty')}}</flux:text>
            @endforelse

        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">Dernière activité</flux:heading>
            @forelse($this->lastUpdateProductsActivities as $lastUpdateProductsActivity)
                <div class="mt-2 flex gap-4 justify-between">
                    <a href="{{ route('admin.stock.show', $product->id) }}">
                        <flux:text class="mt-2 hover:text-(--color-accent-content)">
                            {{$lastUpdateProductsActivity->account->user->name}}
                            {{__('words.update')}}
                            {{$lastUpdateProductsActivity->name}}
                        </flux:text>
                    </a>
                    <flux:text class="mt-2">    {{ \Carbon\Carbon::parse($product->updated_at)->diffForHumans() }}
                    </flux:text>
                </div>
            @empty
                <flux:text class="mt-2">{{__('client.commons.empty')}}</flux:text>
            @endforelse
        </flux:card>
    </div>
</flux:main>
