<flux:main>
    <flux:heading size="xl">{{__('commons.pageName.admin.admin.settings')}}</flux:heading>
    <flux:separator variant="subtle"/>
    <div class="grid grid-cols-3 gap-10 mt-20">
        <div>
            <flux:heading size="l">{{__('admin.settings.theme.title')}}</flux:heading>
        </div>
        <flux:card class="col-span-2">
            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                <flux:radio value="light" icon="sun">{{__('admin.settings.theme.light')}}</flux:radio>
                <flux:radio value="dark" icon="moon">{{__('admin.settings.theme.dark')}}</flux:radio>
                <flux:radio value="system" icon="computer-desktop">{{__('admin.settings.theme.system')}}</flux:radio>
            </flux:radio.group>
        </flux:card>
        <div>
            <flux:heading size="l">{{__('admin.settings.accounts.title')}}</flux:heading>
        </div>
        <flux:card class="col-span-2">
            <form wire:submit.prevent="updateAccount">
                <div class="flex flex-col gap-2">
                    <flux:input wire:model="accountForm.firstname"
                                label="{{__('admin.merchants.form.firstname.label')}}"
                                placeholder="John"/>
                    <flux:input wire:model="accountForm.lastname" label="{{__('admin.merchants.form.lastname.label')}}"
                                placeholder="Doe"/>
                    <flux:input type="email" wire:model="accountForm.email"
                                label="{{__('admin.merchants.form.email.label')}}"
                                placeholder="johndoe@example.com"/>
                    <flux:input wire:model="accountForm.phone" label="{{__('admin.merchants.form.phone.label')}}"
                                placeholder="04 97 45 45 45"/>
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
                            <flux:input wire:model="warehouseForm.name"
                                        label="{{__('admin.settings.warehouse.forms.name.label')}}"
                                        placeholder="Picklio Alpha"/>
                            <flux:input wire:model="warehouseForm.phone"
                                        label="{{__('admin.settings.warehouse.forms.phone.label')}}"
                                        placeholder="04 77 54 54 34"/>
                            <flux:input wire:model="warehouseForm.email"
                                        label="{{__('admin.settings.warehouse.forms.email.label')}}"
                                        placeholder="picklio@exemple.com"/>
                        </div>
                        <div class="flex flex-col gap-2 grow">
                            <flux:input wire:model="warehouseForm.address"
                                        label="{{__('admin.settings.warehouse.forms.address.label')}}"
                                        placeholder="Rue de liège, 2"/>
                            <flux:input wire:model="warehouseForm.postal_code"
                                        label="{{__('admin.settings.warehouse.forms.postal_code.label')}}"
                                        placeholder="4000"/>
                            <flux:select wire:model="warehouseForm.country"
                                         placeholder="{{__('admin.merchants.form.country.placeholder')}}"
                                         label="{{__('admin.merchants.form.country.label')}}">
                                @foreach($this->countries as $code => $name)
                                    <flux:select.option value="{{$code}}">{{$name}}</flux:select.option>
                                @endforeach
                            </flux:select>
                        </div>
                    </div>
                    <div class="flex gap-5 justify-between mt-2">
                        <div class="grow">
                            <flux:input type="time" wire:model="warehouseForm.opening_time"
                                        label="{{__('admin.settings.warehouse.forms.opening_time.label')}}"
                            />
                        </div>
                        <div class="grow">
                            <flux:input type="time" wire:model="warehouseForm.closing_time"
                                        label="{{__('admin.settings.warehouse.forms.closing_time.label')}}"
                            />
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
