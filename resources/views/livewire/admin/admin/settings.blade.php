<flux:main>
    <flux:heading size="xl">{{__('commons.pageName.admin.admin.settings')}}</flux:heading>
    <flux:separator variant="subtle"/>
    <div class="grid grid-cols-1 gap-10 mt-20 md:grid-cols-3">
        <div>
            <flux:heading size="l">{{__('admin.settings.theme.title')}}</flux:heading>
        </div>
        <flux:card class="col-span-2">
            <flux:radio.group         variant="cards"
                                      x-data x-model="$flux.appearance" class=" flex flex-col gap-4">
                <flux:radio value="light" icon="sun" label="{{__('admin.settings.theme.light')}}"/>
                <flux:radio value="dark" icon="moon" label="{{__('admin.settings.theme.dark')}}"/>
                <flux:radio value="system"
                            icon="computer-desktop" label="{{__('admin.settings.theme.system')}}"/>
            </flux:radio.group>
        </flux:card>
        <div>
            <flux:heading size="l">{{__('admin.settings.accounts.title')}}</flux:heading>
        </div>
        <flux:card class="col-span-2">
            <form wire:submit.prevent="updateAccount">
                <div class="flex flex-col gap-2">

                    <flux:field>
                        <flux:label>
                            {{__('admin.merchants.form.firstname.label')}}
                            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                        </flux:label>
                        <flux:input wire:model="accountForm.firstname" placeholder="John"/>
                        <flux:error name="accountForm.firstname"/>
                    </flux:field>

                    <flux:field>
                        <flux:label>
                            {{__('admin.merchants.form.lastname.label')}}
                            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                        </flux:label>
                        <flux:input wire:model="accountForm.lastname" placeholder="Doe"/>
                        <flux:error name="accountForm.lastname"/>
                    </flux:field>

                    <flux:field>
                        <flux:label>
                            {{__('admin.merchants.form.email.label')}}
                            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                        </flux:label>
                        <flux:input type="email" wire:model="accountForm.email" placeholder="johndoe@example.com"/>
                        <flux:error name="accountForm.email"/>
                    </flux:field>

                    <flux:field>
                        <flux:label>
                            {{__('admin.merchants.form.phone.label')}}
                        </flux:label>
                        <flux:input wire:model="accountForm.phone" placeholder="04 97 45 45 45"/>
                        <flux:error name="accountForm.phone"/>
                    </flux:field>

                </div>

                <div class="flex mt-2">
                    <flux:spacer/>
                    <flux:button type="submit" variant="primary">{{__('admin.commons.buttons.edit')}}</flux:button>
                </div>
            </form>
        </flux:card>
        @if($userConnected->account->role_id == \App\Models\Role::WAREHOUSE)
            <div>
                <flux:heading size="l">{{__('admin.settings.warehouse.title')}}</flux:heading>
            </div>
            <flux:card class="col-span-2">
                <form wire:submit.prevent="updateWarehouse">
                    <div class="flex gap-5">
                        <div class="flex flex-col gap-2 grow">

                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.name.label')}}
                                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                                </flux:label>
                                <flux:input wire:model="warehouseForm.name" placeholder="Picklio Alpha"/>
                                <flux:error name="warehouseForm.name"/>
                            </flux:field>

                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.phone.label')}}
                                </flux:label>
                                <flux:input wire:model="warehouseForm.phone" placeholder="04 77 54 54 34"/>
                                <flux:error name="warehouseForm.phone"/>
                            </flux:field>

                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.email.label')}}
                                </flux:label>
                                <flux:input wire:model="warehouseForm.email" placeholder="picklio@exemple.com"/>
                                <flux:error name="warehouseForm.email"/>
                            </flux:field>

                        </div>

                        <div class="flex flex-col gap-2 grow">

                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.address.label')}}
                                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                                </flux:label>
                                <flux:input wire:model="warehouseForm.address" placeholder="Rue de liège, 2"/>
                                <flux:error name="warehouseForm.address"/>
                            </flux:field>

                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.postal_code.label')}}
                                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                                </flux:label>
                                <flux:input wire:model="warehouseForm.postal_code" placeholder="4000"/>
                                <flux:error name="warehouseForm.postal_code"/>
                            </flux:field>

                            <flux:field>
                                <flux:label>
                                    {{__('admin.merchants.form.country.label')}}
                                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                                </flux:label>
                                <flux:select wire:model="warehouseForm.country" placeholder="{{__('admin.merchants.form.country.placeholder')}}">
                                    @foreach($this->countries as $code => $name)
                                        <flux:select.option value="{{$code}}">{{$name}}</flux:select.option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="warehouseForm.country"/>
                            </flux:field>

                        </div>
                    </div>

                    <div class="flex gap-5 justify-between mt-2">
                        <div class="grow">
                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.opening_time.label')}}
                                </flux:label>
                                <flux:input type="time" wire:model="warehouseForm.opening_time"/>
                                <flux:error name="warehouseForm.opening_time"/>
                            </flux:field>
                        </div>
                        <div class="grow">
                            <flux:field>
                                <flux:label>
                                    {{__('admin.settings.warehouse.forms.closing_time.label')}}
                                </flux:label>
                                <flux:input type="time" wire:model="warehouseForm.closing_time"/>
                                <flux:error name="warehouseForm.closing_time"/>
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex mt-2">
                        <flux:spacer/>
                        <flux:button type="submit" variant="primary">{{__('admin.commons.buttons.edit')}}</flux:button>
                    </div>
                </form>
            </flux:card>
        @endif
    </div>
    {{--<div class="flex flex-col mt-20">
        <div class="mb-6">
            <flux:heading size="l">{__('admin.settings.lang')}}</flux:heading>
        </div>
        <div class="w-1/2">
            <flux:select>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <flux:select.option>{{ $properties['native'] }}</flux:select.option>
                    </a>
                @endforeach

            </flux:select>
        </div>
    </div>--}}
</flux:main>
