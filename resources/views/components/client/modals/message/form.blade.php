<form wire:submit.prevent="{{$submit}}">
    <flux:input wire:model="form.title" label="{{__('admin.messages.form.title.label')}}"
                placeholder="{{__('admin.messages.form.title.placeholder')}}"/>

    <flux:textarea wire:model="form.description" label="{{__('admin.messages.form.description.label')}}"
                   placeholder="{{__('admin.messages.form.description.placeholder')}}" class="mt-2"/>
    <div class="flex mt-2">
        <flux:spacer/>
        <flux:button type="submit" variant="primary">{{$button}}</flux:button>
    </div>
</form>
