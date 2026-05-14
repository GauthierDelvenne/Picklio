@props([
    'divClass'       => '',
    'name',
    'label'          => '',
    'model'          => null,
    'modelLive'          => null,
    'placeholder'    => '',
    'inputClass'     => '',
    'inputErrorClass'=> '',
    'forgetPassword'          => false,
    'required'          => false,
    'eyeIcon'        => false,
])
<div class="inputContainer {{$divClass}}">
    <label class="inputContainer__label" for="{{$name}}">{{$label}}@if($required)
            <abbr title="{{__('validation.abbr-required')}}" aria-hidden="true">*</abbr>
        @endif</label>
    <div class="inputContainer__wrapper">
        <input {{ $attributes }}
               name="{{$name}}" id="{{$name}}"
               @isset($model) wire:model="{{$model}}" @endisset
               @isset($modelLive) wire:model.live="{{$modelLive}}" @endisset
               placeholder="{{$placeholder}}" class="inputContainer__wrapper__input {{$inputClass}}">
        @if($eyeIcon)
            <div class="inputContainer__wrapper__icon">
                {{ $slot }}
            </div>
        @endif
    </div>
    @error($model)
    <div class="inputContainer__error {{$inputErrorClass}}">{{ $message }}</div>
    @enderror

    @if($forgetPassword)
        <p class="inputContainer__forgetPassword {{$forgetPassword}}"><a
                href="{{route('auth.password.forget-password')}}">{{__('front.login.forget-password')}}</a></p>
    @endif
</div>
