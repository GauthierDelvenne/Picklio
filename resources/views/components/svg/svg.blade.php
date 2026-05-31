<svg {{ $attributes->merge(['class' => 'icon']) }}>
    <use href="{{ asset('images/sprite.svg#'.$name) }}"></use>
</svg>
