<div class="{{$divClass}}">
    <label for="{{$name}}">{{$label}}</label>
    <input     {{ $attributes }}
               name="{{$name}}" id="{{$name}}"
           @isset($model) wire:model="{{$model}}" @endisset
           @isset($modelLive) wire:model.live="{{$modelLive}}" @endisset
           placeholder="{{$placeholder}}" class="{{$inputClass}}">
    @error($model)
    <div class="{{$inputErrorClass}}">{{ $message }}</div>
    @enderror
</div>
