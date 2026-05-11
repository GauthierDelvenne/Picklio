<div class="catalogue">
    @if(!empty($userConnected) && $userConnected->created_at > now()->subDays(7))
        <x-front.howItWork/>
    @endif
    <section class="catalogue__productSection paddingMedia">

        <h2 class="catalogue__productSection__title">
            {{__('front.catalogue.productSection.title')}}
        </h2>
        <div class="catalogue__productSection__filterContainer">
            <div class="catalogue__productSection__filterContainer__buttonContainer">
                <button wire:click="sortByPrice"
                        class="button button--icon button--filter catalogue__productSection__filterContainer__buttonContainer__button">
                    @if($this->sortBy === 'price' && $this->sortDirection === 'asc')
                        {{__('front.catalogue.productSection.priceFilter.ascending')}}
                        <x-svg.svg class="catalogue__productSection__filterContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    @elseif($this->sortBy === 'price' && $this->sortDirection === 'desc')
                        {{__('front.catalogue.productSection.priceFilter.descending')}}
                        <x-svg.svg
                            class="catalogue__productSection__filterContainer__buttonContainer__button__svg icon--desc"
                            name="arrow"/>
                    @else
                        {{__('front.catalogue.productSection.priceFilter.title')}}
                    @endif
                </button>
                <button wire:click="sortByName"
                        class="button button--icon button--filter catalogue__productSection__filterContainer__buttonContainer__button">
                    @if($this->sortBy === 'name' && $this->sortDirection === 'asc')
                        {{__('front.catalogue.productSection.nameFilter.nameAscending')}}
                        <x-svg.svg class="catalogue__productSection__filterContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    @elseif($this->sortBy === 'name' && $this->sortDirection === 'desc')
                        {{__('front.catalogue.productSection.nameFilter.nameAscending')}}
                        <x-svg.svg
                            class="catalogue__productSection__filterContainer__buttonContainer__button__svg icon--desc"
                            name="arrow"/>
                    @else
                        {{__('front.catalogue.productSection.nameFilter.title')}}
                    @endif
                </button>
            </div>
            <div class="catalogue__productSection__filterContainer__otherFilterContainer">
                <div class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper"
                     x-data="{ open: false }">
                    <button
                        @click="open = !open"
                        class="button button--filter catalogue__productSection__filterContainer__otherFilterContainer__wrapper__button">
                        @if(count($merchant) > 0)
                            {{ count($merchant)  }} {{ __('front.catalogue.productSection.merchantFilter') }}
                        @else
                            {{ __('front.catalogue.productSection.merchantFilter') }}
                        @endif
                    </button>

                    <div x-show="open" x-cloak @click.outside="open = false"
                         class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer">
                        <div
                            class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__searchContainer">
                            <input wire:model.live.debounce.500ms="searchMerchant" type="search" name="searchMerchant"
                                   id="searchMerchant"
                                   placeholder="{{__('front.catalogue.productSection.searchFilter')}}"
                                   class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__searchContainer__search">
                        </div>
                        @foreach($this->merchants as $mer)
                            <div
                                class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item">

                                <input type="checkbox" id="{{ $mer->user->name }}" name="{{ $mer->user->name }}"
                                       wire:model.live="merchant"
                                       value="{{ $mer->id }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__input">
                                <label for="{{ $mer->user->name }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__label">
                                    {{$mer->user->name}}
                                </label>
                            </div>

                        @endforeach
                    </div>

                </div>
                <div class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper"
                     x-data="{ open: false }">

                    <button
                        @click="open = !open"
                        class="button button--filter catalogue__productSection__filterContainer__otherFilterContainer__wrapper__button">
                        @if(count($category) > 0)
                            {{ count($category)  }} {{ __('front.catalogue.productSection.categoryFilter') }}
                        @else
                            {{ __('front.catalogue.productSection.categoryFilter') }}
                        @endif
                    </button>

                    <div x-show="open" x-cloak @click.outside="open = false"
                         class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer">
                        @foreach($this->categories as $cat)
                            <div
                                class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item">

                                <input type="checkbox" id="{{ $cat->name }}" name="{{ $cat->name }}"
                                       wire:model.live="category"
                                       value="{{ $cat->id }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__input">
                                <label for="{{ $cat->name }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__label">
                                    {{ __('client.products.categories.' . $cat->id) }}
                                </label>
                            </div>

                        @endforeach
                    </div>

                </div>
                <input wire:model.live.debounce.500ms="search" type="search" name="search" id="search"
                       placeholder="{{__('front.catalogue.productSection.searchFilter')}}"
                       class="button button--filter catalogue__productSection__filterContainer__otherFilterContainer__search">
            </div>
        </div>
        <div class="catalogue__productSection__productContainer">
            <div class="catalogue__productSection__productContainer__product">
                @forelse($this->products as $product)
                    <a class="catalogue__productSection__productContainer__product__link"
                       href="{{ route('front.catalogue.show', $product->id) }}">
                        <x-front.productCard img="{{$product->picture_path}}"
                                             category="{!!  __('client.products.categories.'.$product->product_category_id)!!}"
                                             is-new="{{$product->created_at > now()->subDays(7) ? 'New' : ''}}"
                                             title="{{$product->name}}"
                                             sale-by="{{$product->account->user->name}}"
                                             price="{{$product->priceFormatted}}"
                                             product-id="{{$product->id}}"
                        />
                    </a>
                @empty
                    <p class="catalogue__productSection__productContainer__product__empty">{{__('front.catalogue.productSection.empty')}}</p>
                @endforelse
            </div>
            <div class="catalogue__productSection__productContainer__paginate">
                {{ $this->products->links() }}
            </div>
        </div>
    </section>

</div>
