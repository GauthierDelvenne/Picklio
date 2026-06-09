<article :class="{ 'active': active === {{$position}} }" class="accordionItem">
    <div class="accordionItem__titleContainer">
        <h3 class="accordionItem__titleContainer__title"
            x-on:click="active = active === {{$position}} ? null : {{$position}}">{{__('front.merchant.cardContainer.'.$position.'.title')}}</h3>
        <div :class="{ 'active': active === {{$position}} }"
             x-on:click="active = active === {{$position}} ? null : {{$position}}"
             x-on:keydown.enter="active = active === {{ $position }} ? null : {{ $position }}"
             class="accordionItem__titleContainer__svgContainer">
            <x-svg.svg title="{{__('svgTitle.arrow')}}"
                       class="accordionItem__titleContainer__svgContainer__svg"
                       name="arrow" tab="true"/>
        </div>
    </div>
    <div x-cloak
         x-show="active === {{$position}}"
         x-collapse
         class="accordionItem__contentContainer">
        <p class="accordionItem__contentContainer__title">{!!__('front.merchant.cardContainer.'.$position.'.content.title')!!}</p>
        <ul class="accordionItem__contentContainer__liste">
            <li class="accordionItem__contentContainer__liste__item">{{__('front.merchant.cardContainer.'.$position.'.content.ulItem.1')}}</li>
            <li class="accordionItem__contentContainer__liste__item">{{__('front.merchant.cardContainer.'.$position.'.content.ulItem.2')}}</li>
            <li class="accordionItem__contentContainer__liste__item">{{__('front.merchant.cardContainer.'.$position.'.content.ulItem.3')}}</li>
            @if($position == 2)
                <li class="accordionItem__contentContainer__liste__item">{{__('front.merchant.cardContainer.'.$position.'.content.ulItem.4')}}</li>
            @endif
        </ul>
        @if($position != 4)
        <p class="accordionItem__contentContainer__content">{{__('front.merchant.cardContainer.'.$position.'.content.endText')}}</p>
        @endif

    </div>
</article>
