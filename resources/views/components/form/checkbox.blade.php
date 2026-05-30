<div class="checkboxContainer {{$divClass}}">
    <input type="checkbox" id="{{ $name }}" @isset($model) wire:model="{{ $model }}" @endisset value="{{ $name }}"
           class="checkboxContainer__input {{$inputClass}}">
    <label for="{{ $name }}" class="checkboxContainer__label">{{ $label }}</label>
    @error($model)
    <div class="checkboxContainer__error {{$inputErrorClass}}">{{ $message }}</div>
    @enderror
</div>
