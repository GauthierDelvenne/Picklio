<div class="catalogue">
    @if($this->isUserAlreadyOrder)
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
                <button wire:click="sortByName"
                        class="button button--icon button--filter catalogue__productSection__filterContainer__buttonContainer__button">
                    @if($this->sortBy === 'name' && $this->sortDirection === 'asc')
                        {{__('front.catalogue.productSection.nameFilter.nameAscending')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                                   class="catalogue__productSection__filterContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    @elseif($this->sortBy === 'name' && $this->sortDirection === 'desc')
                        {{__('front.catalogue.productSection.nameFilter.nameDescending')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
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
                                   aria-label="{{__('front.catalogue.productSection.searchFilter')}}"
                                   placeholder="{{__('front.catalogue.productSection.searchFilter')}}"
                                   class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__searchContainer__search">
                        </div>
                        @foreach($this->merchants as $mer)
                            <div
                                class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item">

                                <input type="checkbox" id="merchant-{{ $mer->id }}" name="merchant-{{ $mer->id }}"
                                       wire:model.live="merchant"
                                       value="{{ $mer->id }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__input">
                                <label for="merchant-{{ $mer->id }}"
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

                                <input type="checkbox" id="category-{{ $cat->id }}" name="category-{{ $cat->id }}"
                                       wire:model.live="category"
                                       value="{{ $cat->id }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__input">
                                <label for="category-{{ $cat->id }}"
                                       class="catalogue__productSection__filterContainer__otherFilterContainer__wrapper__itemContainer__item__label">
                                    {{ __('client.products.categories.' . $cat->id) }}
                                </label>
                            </div>

                        @endforeach
                    </div>

                </div>
                <x-front.search/>
            </div>
        </div>
        <div class="catalogue__productSection__productContainer">
            <div class="catalogue__productSection__productContainer__product" itemscope itemtype="https://schema.org/ItemList">
                <meta itemprop="name" content="{{__('front.catalogue.productSection.title')}}" />
                @forelse($this->products as $product)
                    <div wire:click="goToProduct({{ $product->id }})" wire:key="product-{{ $product->id }}" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <x-front.productCard :img="$product"
                                             category="{!!  __('client.products.categories.'.$product->product_category_id)!!}"
                                             is-new="{{$product->created_at > now()->subDays(7) ? __('words.new') : ''}}"
                                             title="{{$product->name}}"
                                             sale-by="{{$product->account->user->name}}"
                                             price="{{$product->priceFormatted}}"
                                             :product="$product"
                                             wire-click="goToMerchant({{ $product->account->id }})"
                                             wire-click-category="goToCategory({{ $product->productCategory->id }})"
                                             :cartItem="$this->cartItems->get($product->id)"
                        />
                    </div>
                @empty
                    <p class="catalogue__productSection__productContainer__product__empty">{{__('front.catalogue.productSection.empty')}}</p>
                @endforelse
            </div>
            <div class="catalogue__productSection__productContainer__paginate">
                {{ $this->products->links() }}
            </div>
        </div>
    </section>
    <section class="catalogue__contactSection paddingMedia">
        <h2 class="catalogue__contactSection__title">{{__('front.catalogue.contactSection.title')}}</h2>
        <div class="catalogue__contactSection__blockContainer">
            <div class="catalogue__contactSection__blockContainer__informationContainer">
                <p class="catalogue__contactSection__blockContainer__informationContainer__title">{{__('front.catalogue.contactSection.informationContainer.title')}}</p>
                <p class="catalogue__contactSection__blockContainer__informationContainer__content">{!!__('front.catalogue.contactSection.informationContainer.content')!!}</p>
            </div>
            <div x-data="{ show: false }" x-on:form-sent.window="show = true; setTimeout(() => show = false, 3000)"
                 class="catalogue__contactSection__blockContainer__formContainer">
                <x-form.form wire-submit="sendMessage"
                             class="catalogue__contactSection__blockContainer__formContainer__form">
                    <div class="catalogue__contactSection__blockContainer__formContainer__form__container">
                        <x-form.input
                            div-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="name"
                            label="{{__('front.catalogue.contactSection.form.name.label')}}" required="true"
                            type="text" model="form.name"
                            placeholder="{{__('front.catalogue.contactSection.form.name.label')}}"
                            input-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                        <x-form.input
                            div-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="email"
                            label="{{__('front.catalogue.contactSection.form.email.label')}}" required="true"
                            type="email" model="form.email"
                            placeholder="{{__('front.catalogue.contactSection.form.email.label')}}"
                            input-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                    </div>
                    <div class="catalogue__contactSection__blockContainer__formContainer__form__container">
                        <x-form.textarea
                            div-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="merchantSuggest"
                            label="{{__('front.catalogue.contactSection.form.merchantSuggest.label')}}"
                            type="textarea" model="form.merchantSuggest"
                            placeholder="{{__('front.catalogue.contactSection.form.merchantSuggest.label')}}"
                            input-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                        <x-form.textarea
                            div-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="productSuggest"
                            label="{{__('front.catalogue.contactSection.form.productSuggest.label')}}"
                            type="textarea" model="form.productSuggest"
                            placeholder="{{__('front.catalogue.contactSection.form.productSuggest.label')}}"
                            input-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="catalogue__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                    </div>

                    <button type="submit"
                            class="button button--icon catalogue__contactSection__blockContainer__formContainer__form__button">
                        {{__('front.catalogue.contactSection.form.button')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                                   class="catalogue__contactSection__blockContainer__formContainer__form__button__svg"
                                   name="arrow"/>
                    </button>
                </x-form.form>
                <div
                    x-show="show"
                    x-transition
                    class="toast"
                    x-cloak
                >
                    {{__('front.catalogue.contactSection.toast.create.success')}}
                </div>
            </div>
        </div>
    </section>
    <div class="catalogue__cart">
        <a class="catalogue__cart__link" href="{{ route('front.basket') }}">
            <p class="sr-only">{{__('front.catalogue.toBasket')}}</p>
            <x-svg.svg title="{{__('svgTitle.basket')}}"
                       class="catalogue__cart__link__svg"
                       name="basket"/>
        </a>
    </div>
</div>
