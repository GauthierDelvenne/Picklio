<section class="orders paddingMedia">
    <h2 class="orders__title">{{__('front.profil.order.title')}}</h2>
    @forelse($this->orders() as $order)
        <div class="orders__cardContainer">
            <p class="orders__cardContainer__text">#{{$order->code}}</p>
            <p class="orders__cardContainer__text">
                {{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('l d M,')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
            </p>
            <p class="orders__cardContainer__text">{{$order->priceFormatted}}</p>
            <a href="{{ route('front.order.show', $order->uuid) }}"
               class="button button--icon orders__cardContainer__button">
                {{__('front.profil.order.details')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}" class="orders__cardContainer__button__svg" name="arrow"/>
            </a>
        </div>
    @empty
        <p class="orders__empty">
            {{__('admin.commons.empty')}}
        </p>
    @endforelse
</section>
