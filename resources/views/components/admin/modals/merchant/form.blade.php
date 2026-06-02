<form wire:submit.prevent="{{$submit}}" class="space-y-6">
    <flux:field>
        <flux:label>
            {{ __('admin.merchants.form.name.label') }}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:input wire:model="form.name" placeholder="{{__('admin.merchants.form.name.placeholder')}}"/>
        <flux:error name="form.name" />
    </flux:field>

    <div class="flex gap-5">
        <div class="flex flex-col gap-2 grow">
            <flux:field>
                <flux:label>
                    {{ __('admin.merchants.form.firstname.label') }}
                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                </flux:label>
                <flux:input wire:model="form.firstname" placeholder="John"/>
                <flux:error name="form.firstname" />
            </flux:field>

            <flux:field>
                <flux:label>
                    {{ __('admin.merchants.form.lastname.label') }}
                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                </flux:label>
                <flux:input wire:model="form.lastname" placeholder="Doe"/>
                <flux:error name="form.lastname" />
            </flux:field>

            <flux:field>
                <flux:label>
                    {{ __('admin.merchants.form.email.label') }}
                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                </flux:label>
                <flux:input type="email" wire:model="form.email" placeholder="johndoe@example.com"/>
                <flux:error name="form.email" />
            </flux:field>

            <flux:field>
                <flux:label>
                    {{ __('admin.merchants.form.phone.label') }}
                </flux:label>
                <flux:input wire:model="form.phone" placeholder="04 97 45 45 45"/>
                <flux:error name="form.phone" />
            </flux:field>
        </div>

        <div class="flex flex-col gap-2 grow">
            <flux:select wire:model="form.status_id" placeholder="{{__('admin.merchants.form.status.placeholder')}}"
                         label="{{__('admin.merchants.form.status.label')}}">
                @foreach($this->form->statuses as $key => $status)
                    <flux:select.option
                        value="{{$status->id}}">{{__('admin.merchants.status.'.$status->id)}}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:field>
                <flux:label>
                    {{ __('admin.merchants.form.postal_code.label') }}
                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                </flux:label>
                <flux:input type="integer" wire:model="form.postal_code" placeholder="4000"/>
                <flux:error name="form.postal_code" />
            </flux:field>

            <flux:field>
                <flux:label>
                    {{ __('admin.merchants.form.address.label') }}
                    <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
                </flux:label>
                <flux:input wire:model="form.address" placeholder="Rue de liège, 2"/>
                <flux:error name="form.address" />
            </flux:field>

            <flux:select wire:model="form.country" placeholder="{{__('admin.merchants.form.country.placeholder')}}"
                         label="{{__('admin.merchants.form.country.label')}}">
                @foreach($this->countries as $code => $name)
                    <flux:select.option value="{{$code}}">{{$name}}</flux:select.option>
                @endforeach
            </flux:select>
        </div>
    </div>
    <flux:textarea wire:model="form.description" label="{{__('admin.merchants.form.description.label')}}"
                   placeholder="{{__('admin.merchants.form.description.placeholder')}}" class="mt-2"/>
    <div class="flex mt-2">
        <flux:spacer/>
        <flux:button type="submit" variant="primary">{{$button}}</flux:button>
    </div>
</form>
