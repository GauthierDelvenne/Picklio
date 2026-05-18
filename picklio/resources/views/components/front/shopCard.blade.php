<div class="shopCard" x-data="{ show: false, max: false }"
     x-on:add-product.window="show = true; setTimeout(() => show = false, 3000)"
     x-on:max-product.window="max = true; setTimeout(() => max = false, 3000)">
    <div class="shopCard__priceContainer">
        <p class="shopCard__priceContainer__price @if($this->card) shopCard__priceContainer__price--card  @endif">{{$this->price}}</p>
        <div x-on:click.prevent.stop
             class="shopCard__priceContainer__selectContainer @if($this->card) shopCard__priceContainer__selectContainer--card no-card-hover  @endif">
            <x-svg.svg wire:click="decrement"
                       class="shopCard__priceContainer__selectContainer__svg"
                       name="minus"/>
            <input wire:model.live="quantity" type="number" name="itemNumber" id="itemNumber-{{ $this->productId }}"
                   placeholder="00"
                   class="shopCard__priceContainer__selectContainer__value">
            @if($quantity !== $stockAvailable)
                <x-svg.svg wire:click="increment"
                           class="shopCard__priceContainer__selectContainer__svg"
                           name="plus"/>
            @else
                <p class="shopCard__priceContainer__selectContainer__max">MAX</p>
            @endif
        </div>
        @if($this->card && !$this->basket)
            <x-svg.svg wire:click="addToCart" x-on:click.prevent.stop
                       class="shopCard__priceContainer__svg no-card-hover"
                       name="basket"/>
        @endif
    </div>
    @if(!$this->card)
        <div class="shopCard__buttonContainer">
            <button wire:click="addToCart"
                class="button button--icon shopCard__buttonContainer__button">
                {{__('front.product.button')}}
                <x-svg.svg class="shopCard__buttonContainer__button__svg"
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
</div>
