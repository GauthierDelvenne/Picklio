<form wire:submit.prevent="{{$submit}}">
    <flux:input wire:model="form.name" label="{{__('admin.merchants.form.name.label')}}"
                placeholder="{{__('admin.merchants.form.name.placeholder')}}"/>
    <div class="flex gap-5">
        <div class="flex flex-col gap-2 grow">
            <flux:input wire:model="form.firstname" label="{{__('admin.merchants.form.firstname.label')}}"
                        placeholder="John"/>
            <flux:input wire:model="form.lastname" label="{{__('admin.merchants.form.lastname.label')}}"
                        placeholder="Doe"/>
            <flux:input type="email" wire:model="form.email" label="{{__('admin.merchants.form.email.label')}}"
                        placeholder="johndoe@example.com"/>
            <flux:input wire:model="form.phone" label="{{__('admin.merchants.form.phone.label')}}"
                        placeholder="04 97 45 45 45"/>
        </div>
        <div class="flex flex-col gap-2 grow">
            <flux:select wire:model="form.status_id" placeholder="{{__('admin.merchants.form.status.placeholder')}}"
                         label="{{__('admin.merchants.form.status.label')}}">
                @foreach($this->form->statuses as $key => $status)
                    <flux:select.option
                        value="{{$status->id}}">{{__('admin.merchants.status.'.$status->id)}}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:input type="integer" wire:model="form.postal_code"
                        label="{{__('admin.merchants.form.postal_code.label')}}" placeholder="4000"/>
            <flux:input wire:model="form.address" label="{{__('admin.merchants.form.address.label')}}"
                        placeholder="Rue de liège, 2"/>
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
