<form wire:submit.prevent="{{$submit}}" class="flex flex-col gap-2">
    <flux:input wire:model="form.name" label="{{__('client.products.forms.name.label')}}"
                placeholder="{{__('client.products.forms.name.placeholder')}}"/>
    <flux:input wire:model="form.description" label="{{__('client.products.forms.description.label')}}"
                placeholder="{{__('client.products.forms.description.placeholder')}}"/>
    <flux:select wire:model="form.category_id" placeholder="{{__('client.products.forms.category.placeholder')}}"
                 label="{{__('client.products.forms.category.label')}}">
        @foreach($this->form->categories as $key => $category)
            <flux:select.option
                value="{{$category->id}}">{{__('client.products.categories.'.$category->id)}}</flux:select.option>
        @endforeach
    </flux:select>
    <flux:input wire:model="form.price" label="{{__('client.products.forms.price.label')}}"/>
    <flux:input wire:model="form.percentage" label="{{__('client.products.forms.percentage.label')}}"/>
    <div class="flex gap-5">
        <flux:input type="date" wire:model="form.start_at" label="{{__('client.products.forms.start_at.label')}}"/>
        <flux:input type="date" wire:model="form.end_at" label="{{__('client.products.forms.end_at.label')}}"/>
    </div>
    <flux:input type="file" wire:model="form.picture_path" label="{{__('client.products.forms.picture_path.label')}}"/>
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
    <flux:checkbox wire:model="form.is_active" label="{{__('client.products.forms.is_active.label')}}"/>
    <flux:button type="submit" variant="primary">
        {{$button}}
    </flux:button>
</form>
