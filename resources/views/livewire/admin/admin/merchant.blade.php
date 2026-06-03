<flux:main class="space-y-6">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item
            href="{{route('admin.merchant.index')}}">{{__('commons.pageName.admin.admin.merchants')}}</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>{{$this->account->user->name}}</flux:breadcrumbs.item>
    </flux:breadcrumbs>
    <section class="flex justify-between content-center items-center">
        <flux:heading size="xl" level="2">{{__('admin.merchants.edit')}}</flux:heading>
        <flux:modal.trigger name="delete-merchant">
            <flux:button variant="danger">{{__('admin.commons.buttons.inactive')}}</flux:button>
        </flux:modal.trigger>
    </section>
    <flux:separator variant="subtle"/>
    <x-admin.modals.merchant.form submit="update" button="{{__('admin.commons.buttons.edit')}}"/>
    <flux:modal name="delete-merchant" class="md:w-96">
        <x-admin.modals.merchant.delete-merchant/>
    </flux:modal>
    <div
        class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 gap-4 flex flex-col justify-between  sm:flex-row">
            <flux:heading size="l">{{__('commons.pageName.admin.admin.stocks')}}</flux:heading>
            <div class="mb-4 flex gap-4">
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass"
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
</flux:main>
