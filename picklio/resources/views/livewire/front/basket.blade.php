<div class="basket">
    <section x-data="{ deleteOrder: false }"
             x-on:delete-order.window="deleteOrder = true; setTimeout(() => deleteOrder = false, 3000)"
             class="basket__container paddingMedia">
        <h2 class="basket__container__title">Votre panier</h2>
        <div class="basket__container__basketContainer">
            <div class="basket__container__basketContainer__itemContainer">
                @forelse($this->orderItems as $orderItem)
                    <div wire:key="orderItem-{{ $orderItem->id }}" class="basket__container__basketContainer__itemContainer__card">
                        <div class="basket__container__basketContainer__itemContainer__card__imgContainer">
                            @if($orderItem->product->picture_path == 'images/missing-product.webp')
                                <img src="{{asset($orderItem->product->picture_path)}}" alt=""
                                     class="basket__container__basketContainer__itemContainer__card__imgContainer__img">
                            @else
                                <img
                                    src="{{ $orderItem->product->pictureUrl(600) }}"
                                    srcset="{{ $orderItem->product->pictureUrl(300) }} 300w, {{ $orderItem->product->pictureUrl(600) }} 600w,{{ $orderItem->product->pictureUrl(900) }} 900w"
                                    sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                                    alt="{{$orderItem->product->name}}"
                                    class="basket__container__basketContainer__itemContainer__card__imgContainer__img">
                            @endif
                        </div>
                        <p class="basket__container__basketContainer__itemContainer__card__name"><a
                                href="{{ route('front.catalogue.show', $orderItem->product->id) }}"
                                class="basket__container__basketContainer__itemContainer__card__name__link">{{$orderItem->product->name}}</a>
                        </p>
                        <livewire:front.components.shop-card
                            :price="$orderItem->priceFormatted"
                            :productId="$orderItem->product->id"
                            :card="true"
                            :basket="true"
                            :quantity="$orderItem->quantity"
                        />

                        <x-svg.svg wire:click="delete({{$orderItem->id}})"
                                   class="basket__container__basketContainer__itemContainer__card__delete__svg"
                                   name="trash"/>
                    </div>
                @empty
                    <div class="basket__container__basketContainer__itemContainer__card">
                        <p class="basket__container__basketContainer__itemContainer__card__empty">Vous n’avez rien dans
                            votre panier @if(empty($this->userConnected))
                                <a href="{{ route('auth.login') }}"
                                   class="basket__container__basketContainer__itemContainer__card__empty__link">Connectez-vous</a>
                            @endif </p>
                    </div>
                @endforelse
                <div
                    x-show="deleteOrder"
                    x-transition
                    class="toast"
                    x-cloak
                >
                    {{__('front.order.toast.remove.success')}}
                </div>
            </div>
            @if(!empty($this->orderItems))
                <aside class="basket__container__basketContainer__priceContainer">
                    <h3 class="basket__container__basketContainer__priceContainer__title">Total de votre panier</h3>
                    <hr class="basket__container__basketContainer__priceContainer__hr">
                    <div class="basket__container__basketContainer__priceContainer__valueContainer">
                        <p class="basket__container__basketContainer__priceContainer__valueContainer__title">Prix
                            HTVA</p>
                        <p class="basket__container__basketContainer__priceContainer__valueContainer__value"></p>
                    </div>
                    <div class="basket__container__basketContainer__priceContainer__valueContainer">
                        <p class="basket__container__basketContainer__priceContainer__valueContainer__title">TVA
                            21%*</p>
                        <p class="basket__container__basketContainer__priceContainer__valueContainer__value"></p>
                    </div>
                    <hr class="basket__container__basketContainer__priceContainer__hr">
                    <div class="basket__container__basketContainer__priceContainer__valueContainer">
                        <p class="basket__container__basketContainer__priceContainer__valueContainer__title">Total</p>
                        <p class="basket__container__basketContainer__priceContainer__valueContainer__value">{{$orderItem->order->priceFormatted}}</p>
                    </div>
                    <button class="button button--icon basket__container__basketContainer__priceContainer__button">
                        Continuer
                        <x-svg.svg class="basket__container__basketContainer__priceContainer__button__svg"
                                   name="arrow"/>
                    </button>
                    <p class="basket__container__basketContainer__priceContainer__condition">*21% par défaut et 6%
                        produit alimentaire</p>
                </aside>
            @endif
        </div>

    </section>
</div>
