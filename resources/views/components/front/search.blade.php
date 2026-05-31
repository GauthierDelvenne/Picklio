<div class="searchContainer">
    <x-svg.svg title="search"
               class="searchContainer__svg"
               name="search"/>
    <input wire:model.live.debounce.500ms="search" type="search" name="search" id="search"
           placeholder="{{__('front.catalogue.productSection.searchFilter')}}…"
           class="searchContainer__search">
</div>
