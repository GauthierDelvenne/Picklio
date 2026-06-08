@props([
    'tab' => false,
    'name',
    'title',
])

<svg {{ $attributes->merge(['class' => 'icon']) }} @if($tab)  tabindex="0" role="button" aria-label="{{$title}}" @endif>
    <use href="{{ asset('images/sprite.svg#'.$name) }}"></use>
</svg>
