<div class="productCategoryCard" wire:click="{{$wireClick}}">
    <x-svg.svg title="{{__('svgTitle.'.$name)}}" class="productCategoryCard__svg" name="{{$name}}"/>
    <p class="productCategoryCard__title">{{$title}}</p>
</div>
