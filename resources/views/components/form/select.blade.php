@props([
    'divClass'       => '',
    'name',
    'label'          => '',
    'model'          => null,
    'modelLive'          => null,
    'placeholder'    => '',
    'inputClass'     => '',
    'inputErrorClass'=> '',
    'required'          => false,
])

<div class="inputContainer {{$divClass}}">
    <label class="inputContainer__label" for="{{$name}}">{{$label}}@if($required)
            <abbr title="{{__('validation.abbr-required')}}" aria-hidden="true">*</abbr>
        @endif</label>
    <div class="inputContainer__wrapper">
        <select {{ $attributes }}
                name="{{$name}}" id="{{$name}}"
                @isset($model) wire:model="{{$model}}" @endisset
                @isset($modelLive) wire:model.live="{{$modelLive}}" @endisset
                placeholder="{{$placeholder}}" class="inputContainer__wrapper__input {{$inputClass}}">
            {{$slot}}
        </select>
    </div>
    @error($model)
    <div class="inputContainer__error {{$inputErrorClass}}">{{ $message }}</div>
    @enderror
</div>
