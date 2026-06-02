<form wire:submit.prevent="{{$submit}}" class="space-y-6">
<flux:field>
        <flux:label>
            {{ __('admin.messages.form.title.label') }}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:input wire:model="form.title" placeholder="{{ __('admin.messages.form.title.placeholder') }}" />
        <flux:error name="form.title" />
    </flux:field>

    <flux:field class="mt-2">
        <flux:label>
            {{ __('admin.messages.form.description.label') }}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:textarea wire:model="form.description" placeholder="{{ __('admin.messages.form.description.placeholder') }}" />
        <flux:error name="form.description" />
    </flux:field>

    <flux:field class="mt-2">
        <flux:label>
            {{ __('admin.messages.form.recipient.label') }}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:select wire:model="form.recipient_id" placeholder="{{ __('admin.messages.form.recipient.placeholder') }}">
            <flux:select.option value="">{{ __('admin.messages.form.recipient.placeholder') }}</flux:select.option>
            @foreach($this->form->recipients as $key => $recipient)
                <flux:select.option value="{{ $recipient->id }}">{{ $recipient->user->name }}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:error name="form.recipient_id" />
    </flux:field>

    <div class="flex mt-2">
        <flux:spacer/>
        <flux:button type="submit" variant="primary">{{ $button }}</flux:button>
    </div>
</form>
