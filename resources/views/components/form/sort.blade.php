<button wire:click="{{$wireClick}}"
        class="button button--icon button--filter sort">
    @if($this->sortBy === $sortBy && $this->sortDirection === 'asc')
        {{__('front.catalogue.productSection.'.$sortBy.'Filter.'.$sortBy.'Ascending')}}
        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                   class="sort__svg"
                   name="arrow"/>
    @elseif($this->sortBy === $sortBy && $this->sortDirection === 'desc')
        {{__('front.catalogue.productSection.'.$sortBy.'Filter.'.$sortBy.'Descending')}}
        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                   class="sort__svg icon--desc"
                   name="arrow"/>
    @else
        {{__('front.catalogue.productSection.'.$sortBy.'Filter.title')}}
    @endif
</button>
