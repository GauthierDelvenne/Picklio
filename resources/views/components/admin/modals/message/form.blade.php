<form wire:submit.prevent="{{$submit}}">
    <flux:input wire:model="form.title" label="{{__('admin.messages.form.title.label')}}"
                placeholder="{{__('admin.messages.form.title.placeholder')}}"/>

    <flux:textarea wire:model="form.description" label="{{__('admin.messages.form.description.label')}}"
                   placeholder="{{__('admin.messages.form.description.placeholder')}}" class="mt-2"/>
    <flux:select wire:model="form.recipient_id" placeholder="{{__('admin.messages.form.recipient.placeholder')}}"
                 label="{{__('admin.messages.form.recipient.label')}}">
        <flux:select.option
            value="">{{__('admin.messages.form.recipient.placeholder')}}</flux:select.option>
        @foreach($this->form->recipients as $key => $recipient)
            <flux:select.option
                value="{{$recipient->id}}">{{$recipient->user->name}}</flux:select.option>
        @endforeach
    </flux:select>
    <div class="flex mt-2">
        <flux:spacer/>
        <flux:button type="submit" variant="primary">{{$button}}</flux:button>
    </div>
</form>
