<div class="{{$divClass}}">
    <input type="checkbox" id="{{ $name }}" @isset($model) wire:model="{{ $model }}" @endisset value="{{ $name }}"
           class="{{$inputClass}}">
    <label for="{{ $name }}">{{ $label }}</label>
    @error($model)
    <div class="{{$inputErrorClass}}">{{ $message }}</div>
    @enderror
</div>
