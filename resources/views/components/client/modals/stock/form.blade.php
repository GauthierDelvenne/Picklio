<form wire:submit.prevent="{{$submit}}" class="flex flex-col gap-2">

    <flux:field>
        <flux:label>
            {{__('client.products.forms.name.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:input wire:model="form.name" placeholder="{{__('client.products.forms.name.placeholder')}}"/>
        <flux:error name="form.name" />
    </flux:field>

    <flux:field>
        <flux:label>
            {{__('client.products.forms.description.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:input wire:model="form.description" placeholder="{{__('client.products.forms.description.placeholder')}}"/>
        <flux:error name="form.description" />
    </flux:field>

    <flux:field>
        <flux:label>
            {{__('client.products.forms.category.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:select wire:model="form.category_id" placeholder="{{__('client.products.forms.category.placeholder')}}">
            @foreach($this->form->categories as $key => $category)
                <flux:select.option value="{{$category->id}}">
                    {{__('client.products.categories.'.$category->id)}}
                </flux:select.option>
            @endforeach
        </flux:select>
        <flux:error name="form.category_id" />
    </flux:field>

    <flux:field>
        <flux:label>
            {{__('client.products.forms.price.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:input type="number" step="0.01" wire:model="form.price" />
        <flux:error name="form.price" />
    </flux:field>

    <flux:field>
        <flux:label>
            {{__('client.products.forms.picture_path.label')}}
            <abbr title="{{ __('validation.abbr-required') }}" class="text-accent ml-1">*</abbr>
        </flux:label>
        <flux:input type="file" wire:model="form.picture_path" />
        <flux:error name="form.picture_path" />
    </flux:field>

    @if($this->form->picture_path instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
        <div class="w-32 h-32 mt-2">
            <img src="{{ $this->form->picture_path->temporaryUrl() }}"
                 alt="{{$this->form->name}}"
                 class="w-full h-full object-cover object-center">
        </div>
    @elseif(isset($this->form->real_picture_path) && $this->form->real_picture_path)
        <div class="w-32 h-32 mt-2">
            <img src="{{ Storage::url($this->form->real_picture_path) }}"
                 alt="{{$this->form->name}}"
                 class="w-full h-full object-cover object-center">
        </div>
    @endif

    <flux:field>
        <flux:label>
            {{__('client.products.forms.is_active.label')}}
        </flux:label>
        <flux:checkbox wire:model="form.is_active"/>
        <flux:error name="form.is_active" />
    </flux:field>

    <flux:button type="submit" variant="primary">
        {{$button}}
    </flux:button>
</form>
