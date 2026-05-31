<div class="shopCard" x-data="{ show: false, max: false, register: false }"
     x-on:add-product.window="show = true; setTimeout(() => show = false, 3000)"
     x-on:max-product.window="max = true; setTimeout(() => max = false, 3000)"
     x-on:register.window="if ($event.detail.productId === {{ $this->productId }}) register = true">
    <div class="shopCard__priceContainer">
        <p class="shopCard__priceContainer__price @if($this->card) shopCard__priceContainer__price--card  @endif">{{$this->price}} @if($this->basket)
                <span class="shopCard__priceContainer__price__span">{{$this->product->priceFormatted}}/u</span>
            @endif
        </p>
        <div x-on:click.prevent.stop
             class="shopCard__priceContainer__selectContainer @if($this->card) shopCard__priceContainer__selectContainer--card no-card-hover  @endif">
            <x-svg.svg title="{{__('svgTitle.minus')}}" wire:click="decrement"
                       class="shopCard__priceContainer__selectContainer__svg"
                       name="minus"/>
            <input aria-label="{{__('admin.stocks.forms.quantity.attribute')}}" wire:model.live="quantity" type="number" name="itemNumber" id="itemNumber-{{ $this->productId }}"
                   placeholder="00"
                   class="shopCard__priceContainer__selectContainer__value">
            @if($quantity !== $stockAvailable)
                <x-svg.svg title="{{__('svgTitle.plus')}}" wire:click="increment"
                           class="shopCard__priceContainer__selectContainer__svg"
                           name="plus"/>
            @else
                <p class="shopCard__priceContainer__selectContainer__max">{{__('front.order.max')}}</p>
            @endif
        </div>
        @if($this->card && !$this->basket)
            <x-svg.svg title="{{__('svgTitle.basket')}}" wire:click="addToCart" x-on:click.prevent.stop
                       class="shopCard__priceContainer__svg no-card-hover"
                       name="basket"/>
        @endif
    </div>
    @if(!$this->card)
        <div class="shopCard__buttonContainer">
            <button wire:click="addToCart"
                    class="button button--icon shopCard__buttonContainer__button">
                {{__('front.product.button')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}" class="shopCard__buttonContainer__button__svg"
                           name="arrow"/>
            </button>
        </div>
    @endif
    <div
        x-show="show"
        x-transition
        class="toast"
        x-cloak
    >
        {{__('front.order.toast.add.success')}}
    </div>
    <div
        x-show="max"
        x-transition
        class="toast"
        x-cloak
    >
        {{__('front.order.toast.max.success')}}
    </div>
    <div
        x-show="register"
        x-transition
        class="modal--overlay shopCard__modalContainer"
        x-cloak>
        <div class="modal shopCard__modalContainer__modal">
            <button aria-label="{{__('svgTitle.close')}}" type="button" x-on:click="register = false">
            <x-svg.svg title="{{__('svgTitle.close')}}"  class="shopCard__modalContainer__modal__svg" name="plus"/>
            </button>
            <div class="shopCard__modalContainer__modal__titleContainer">
            <x-svg.svg title="{{__('svgTitle.circle-danger')}}" name="circle-danger" class="shopCard__modalContainer__modal__titleContainer__svg"/>
            <p class="shopCard__modalContainer__modal__titleContainer__title">{{__('front.order.toast.register.success')}}</p>
            </div>
            <div class="shopCard__modalContainer__modal__buttonContainer">
                <a href="{{route('auth.login')}}" class="button button--icon  shopCard__modalContainer__modal__buttonContainer__button">
                    {{__('auth.form.button.login')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}" class=" shopCard__modalContainer__modal__buttonContainer__button__svg" name="arrow"/>
                </a>
                <a href="{{route('auth.register')}}" class="button button--icon  shopCard__modalContainer__modal__buttonContainer__button">
                    {{__('auth.form.button.register')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}" class=" shopCard__modalContainer__modal__buttonContainer__button__svg" name="arrow"/>
                </a>
            </div>
        </div>
    </div>
</div>
