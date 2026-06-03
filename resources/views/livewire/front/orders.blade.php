<section class="orders paddingMedia">
    <h2 class="orders__title">{{__('front.profil.order.title')}}</h2>
    <div class="catalogue__productSection__filterContainer__buttonContainer">
        <x-form.sort wire-click="sortByDate" sort-by="pickup_date"/>
        <x-form.sort wire-click="sortByPrice" sort-by="total_price"/>
        <x-front.search/>
    </div>
    @forelse($this->orders() as $order)
        <div class="orders__cardContainer">
            <p class="orders__cardContainer__text">#{{$order->code}}</p>
            <p class="orders__cardContainer__text">
                {{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('l d M,')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
            </p>
            <p class="orders__cardContainer__text">{{$order->priceFormatted}}</p>
            <x-front.button-link :link="route('front.order.show', $order->uuid)" class="orders__cardContainer__button" :title="__('front.profil.order.details')"/>
        </div>
    @empty
        <p class="orders__empty">
            {{__('admin.commons.empty')}}
        </p>
    @endforelse
</section>
