<flux:main>
    <section class="flex justify-between gap-10 mb-12">
        <flux:heading size="xl" level="2">{{__('commons.pageName.admin.admin.merchants')}}</flux:heading>
        <flux:modal.trigger name="add-merchant">
            <flux:button variant="primary">
                <flux:icon.plus/>
                {{__('admin.merchants.add')}}
            </flux:button>
        </flux:modal.trigger>

    </section>
    <div class="flex justify-between gap-10 mb-12">
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">                {{__('admin.merchants.total-merchants')}}
            </flux:heading>
            <flux:text class="mt-2">{{$this->merchants->total()}} {{__('words.merchant')}}</flux:text>
        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.merchants.new-merchants')}}</flux:heading>
            <flux:text class="mt-2">{{$this->newMerchantsCount()}} {{__('words.merchant')}}</flux:text>
        </flux:card>
        <flux:card class="w-md">
            <flux:heading class="flex items-center gap-2">{{__('admin.merchants.actif-merchants')}}</flux:heading>
            <flux:text class="mt-2">{{$this->actifMerchantsCount()}} {{__('words.merchant')}}</flux:text>
        </flux:card>

    </div>
    <div class="bg-zinc-100 text-black dark:bg-[color-mix(in_oklab,white_10%,transparent)] dark:text-white p-10 rounded-2xl">
        <div class="mb-4 flex justify-between ">
            <flux:heading size="l">{{__('commons.pageName.admin.admin.merchants')}}</flux:heading>
            <div class="mb-4 flex gap-10">
                <flux:select wire:model.live="status">
                    <flux:select.option value="">{{__('admin.merchants.form.status.placeholder')}}</flux:select.option>
                    @foreach($this->form->statuses as $key => $status)
                        <flux:select.option
                            value="{{$status->id}}">{{__('admin.merchants.status.'.$status->id)}}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model.live.debounce.500ms="search" icon="magnifying-glass"
                            placeholder="{{__('admin.commons.search')}}"/>
            </div>
        </div>

        <flux:table :paginate="$this->merchants">
            <flux:table.columns>
                <flux:table.column sortable :sorted="$sortBy === 'users.name'" :direction="$sortDirection"
                                   wire:click="sort('users.name')">{{__('admin.merchants.shop-name')}}
                </flux:table.column>
                <flux:table.column>{{__('admin.merchants.form.status.label')}}</flux:table.column>
                <flux:table.column>{{__('admin.merchants.arrived')}}</flux:table.column>
                <flux:table.column></flux:table.column>

            </flux:table.columns>
            <flux:table.rows>
                @forelse($this->merchants as $merchant)
                    <flux:table.row>
                        <flux:table.cell>
                            <a href="{{ route('admin.merchant.show', $merchant->id) }}" class="hover:text-(--color-accent-content)">
                                {{$merchant->user_name}}
                            </a>
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:badge :color=" $merchant->status_id == \App\Models\Status::ACTIVE ? 'green' :
                            ($merchant->status_id == \App\Models\Status::INWAIT ? 'yellow' : 'zinc')">
                                • {{__('admin.merchants.status.'.$merchant->status_id)}}
                            </flux:badge>

                        </flux:table.cell>
                        <flux:table.cell>
                            {{$merchant->created_at->format('Y-m-d') }}
                        </flux:table.cell>
                        <flux:table.cell>
                            <flux:dropdown position="left" align="center">
                                <flux:button variant="ghost">
                                    <flux:icon.ellipsis-horizontal/>
                                </flux:button>
                                <flux:menu>
                                    <a href="{{route('admin.merchant.show', $merchant->id)}}">
                                        <flux:menu.item class="hover:text-(--color-accent-content)">{{__('admin.commons.buttons.edit')}}</flux:menu.item>
                                    </a>
                                    <flux:menu.item wire:click="delete({{$merchant}})" class="hover:text-(--color-accent-content)"
                                                    wire:confirm="{{__('admin.merchants.delete-confirm', ['name' => $merchant->user_name])}}">{{__('admin.commons.buttons.delete')}}</flux:menu.item>
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
    <flux:modal name="add-merchant" class="md:w-96">
        <x-admin.modals.merchant.add-merchant/>
    </flux:modal>

</flux:main>
