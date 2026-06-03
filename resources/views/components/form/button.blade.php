@props([
    'type' => 'submit',
    'class',
    'title' => false,
])

<button type="{{$type}}"
        class="button button--icon {{$class}}">
    @if($title)
        {{$title}}
    @else
        {{__('front.merchant.contactSection.contactContainer.form.button')}}
    @endif
    <x-svg.svg title="{{__('svgTitle.arrow')}}"
               class="{{$class}}__svg"
               name="arrow"/>
</button>
