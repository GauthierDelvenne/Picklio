<section class="orders paddingMedia">
    <h2 class="orders__title">{{__('front.profil.order.title')}}</h2>
    <div class="catalogue__productSection__filterContainer__buttonContainer">
        <button wire:click="sortByPrice"
                class="button button--icon button--filter catalogue__productSection__filterContainer__buttonContainer__button">
            @if($this->sortBy === 'price' && $this->sortDirection === 'asc')
                {{__('front.catalogue.productSection.priceFilter.ascending')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}"
                           class="catalogue__productSection__filterContainer__buttonContainer__button__svg"
                           name="arrow"/>
            @elseif($this->sortBy === 'price' && $this->sortDirection === 'desc')
                {{__('front.catalogue.productSection.priceFilter.descending')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}"
                           class="catalogue__productSection__filterContainer__buttonContainer__button__svg icon--desc"
                           name="arrow"/>
            @else
                {{__('front.catalogue.productSection.priceFilter.title')}}
            @endif
        </button>
        <button wire:click="sortByDate"
                class="button button--icon button--filter catalogue__productSection__filterContainer__buttonContainer__button">
            @if($this->sortBy === 'pickup_date' && $this->sortDirection === 'asc')
                {{__('front.catalogue.productSection.nameFilter.nameAscending')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}"
                           class="catalogue__productSection__filterContainer__buttonContainer__button__svg"
                           name="arrow"/>
            @elseif($this->sortBy === 'pickup_date' && $this->sortDirection === 'desc')
                {{__('front.catalogue.productSection.nameFilter.nameAscending')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}"
                           class="catalogue__productSection__filterContainer__buttonContainer__button__svg icon--desc"
                           name="arrow"/>
            @else
                {{__('front.catalogue.productSection.nameFilter.title')}}
            @endif
        </button>
        <x-front.search/>
    </div>
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
