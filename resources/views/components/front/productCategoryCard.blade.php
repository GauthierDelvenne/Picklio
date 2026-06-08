<div class="productCategoryCard" wire:click="{{$wireClick}}" wire:keydown.enter.stop="{{$wireClick}}" tabindex="0" role="link">
    <x-svg.svg title="{{__('svgTitle.'.$name)}}" class="productCategoryCard__svg" name="{{$name}}"/>
    <p class="productCategoryCard__title">{{$title}}</p>
</div>
