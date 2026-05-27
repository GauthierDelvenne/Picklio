<section class="orderConfirmation__container paddingMedia">
    <h2 class="orderConfirmation__container__title">{{__('front.profil.order.title-detail')}}</h2>
    <a href="{{ route('front.order.index') }}" class="orderConfirmation__container__svgContainer">
        <x-svg.svg title="{{__('svgTitle.arrow')}}" class="orderConfirmation__container__svgContainer__svg" name="arrow"/>
        <p class="orderConfirmation__container__svgContainer__svg__text">{{__('front.profil.order.return-detail')}}</p>
    </a>
    <div class="orderConfirmation__container__cardContainer">
        <div class="orderConfirmation__container__cardContainer__card">
            <p class="orderConfirmation__container__cardContainer__card__title">{{__('front.order-confirmation.product')}}</p>
            @foreach($this->orderItems as $orderItem)
                <div class="orderConfirmation__container__cardContainer__card__productContainer">
                    <p class="orderConfirmation__container__cardContainer__card__productContainer__information">{{$orderItem->quantity}}
                        x</p>
                    <p class="orderConfirmation__container__cardContainer__card__productContainer__information">{{$orderItem->product->name}}</p>
                </div>
            @endforeach
        </div>
        <div class="orderConfirmation__container__cardContainer__card">
            <p class="orderConfirmation__container__cardContainer__card__title">{{__('front.order-confirmation.information')}}</p>
            <div class="orderConfirmation__container__cardContainer__card__informationContainer">
                <p class="orderConfirmation__container__cardContainer__card__informationContainer__item"><span
                        class="orderConfirmation__container__cardContainer__card__informationContainer__item__span">{{__('front.order-confirmation.slot')}}: </span>{{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('l d M,')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
                </p>
                <p class="orderConfirmation__container__cardContainer__card__informationContainer__item"><span
                        class="orderConfirmation__container__cardContainer__card__informationContainer__item__span">{{__('front.order-confirmation.email')}}: </span>{{$order->account->email}}
                </p>
                <p class="orderConfirmation__container__cardContainer__card__informationContainer__item"><span
                        class="orderConfirmation__container__cardContainer__card__informationContainer__item__span">{{__('front.order-confirmation.total')}}: </span>{{$order->priceFormatted}}
                </p>
            </div>
        </div>
    </div>
</section>
