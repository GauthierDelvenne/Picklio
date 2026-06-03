<button type="button" wire:click="{{$wireClick}}"
        class="button button--icon {{$class}}">
    {{$title}}
    <x-svg.svg title="{{__('svgTitle.arrow')}}" class="{{$class}}__svg"
               name="arrow"/>
</button>
