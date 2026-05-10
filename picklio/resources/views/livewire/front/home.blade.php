<div class="home">
    <section class="home__introContainer paddingMedia">
        <div class="home__introContainer__contentContainer">
            <h2 class="home__introContainer__contentContainer__title">{{__('front.home.intro.title')}}</h2>
            <p class="home__introContainer__contentContainer__content">{{__('front.home.intro.content')}}</p>
            <div class="home__introContainer__contentContainer__buttonContainer">
                <a href="{{route('front.catalogue.index')}}"
                   class="button button--icon home__introContainer__contentContainer__buttonContainer__button">{{__('front.home.intro.buttonDiscover')}}
                    <x-svg.svg class="home__introContainer__contentContainer__buttonContainer__button__svg"
                               name="arrow"/>
                </a>
                <a href="#merchant"
                   class="button button--icon home__introContainer__contentContainer__buttonContainer__button">{{__('front.home.intro.buttonJoin')}}
                    <x-svg.svg class="home__introContainer__contentContainer__buttonContainer__button__svg"
                               name="arrow"/>
                </a>
            </div>
            <ul class="home__introContainer__contentContainer__liste">
                <li class="home__introContainer__contentContainer__liste__item">
                    <x-svg.svg class="home__introContainer__contentContainer__liste__item__svg" name="underline"/>
                    {{__('front.home.intro.quality.1')}}
                </li>
                <li class="home__introContainer__contentContainer__liste__item">
                    <x-svg.svg class="home__introContainer__contentContainer__liste__item__svg" name="underline"/>
                    {{__('front.home.intro.quality.2')}}
                </li>
                <li class="home__introContainer__contentContainer__liste__item">
                    <x-svg.svg class="home__introContainer__contentContainer__liste__item__svg" name="underline"/>
                    {{__('front.home.intro.quality.3')}}
                </li>
            </ul>
        </div>
        <div class="home__introContainer__imgContainer">
            <img src="{{asset('images/landing.webp')}}" alt="Picklio" class="home__introContainer__imgContainer__img">
        </div>
    </section>
    <x-front.howItWork/>
    <div class="home__categoriesSelectContainer">
        <div class="home__categoriesSelectContainer__buttonContainer">
            <button
                class="button button--tabs home__categoriesSelectContainer__buttonContainer__button @if($activeTab == 'tab1') active @endif"
                wire:click="changeTab('tab1')">{{__('front.home.alimentaryList.tabs')}}</button>
            <button
                class="button button--tabs home__categoriesSelectContainer__buttonContainer__button @if($activeTab == 'tab2') active @endif"
                wire:click="changeTab('tab2')">{{__('front.home.noAlimentaryList.tabs')}}</button>
        </div>

        {{--     todo faire le redirect avec filtre--}}

        @if($activeTab == 'tab1')
            <x-front.productList :products="$this->alimentaryProducts" title="{{__('front.home.alimentaryList.title')}}"
                                 button="{{__('front.home.alimentaryList.button')}}"/>
        @elseif($activeTab == 'tab2')
            <x-front.productList :products="$this->noAlimentaryProducts"
                                 title="{{__('front.home.noAlimentaryList.title')}}"
                                 button="{{__('front.home.noAlimentaryList.button')}}"/>
        @endif
        <section class="home__categoriesSelectContainer__productCategories paddingMedia">
            <div class="home__categoriesSelectContainer__productCategories__titleContainer">
                <h2 class="home__categoriesSelectContainer__productCategories__titleContainer__title">{{__('front.home.productCategories.title')}}</h2>

            </div>
            @if($activeTab == 'tab1')
                <div class="home__categoriesSelectContainer__productCategories__categoryContainer">
                    @foreach($this->alimentaryCategories as $category)
                        <x-front.productCategoryCard name="{{$category}}"
                                                     title="{!!__('client.products.categories.'.$loop->index + 1)!!}"/>
                    @endforeach
                </div>
            @elseif($activeTab == 'tab2')
                <div class="home__categoriesSelectContainer__productCategories__categoryContainer">
                    @foreach($this->noAlimentaryCategories as $category)
                        <x-front.productCategoryCard name="{{$category}}"
                                                     title="{!!__('client.products.categories.'.$loop->index + 1)!!}"/>
                    @endforeach
                </div>
            @endif

        </section>
    </div>
    <hr class="home__hr">
    <section id="merchant" class="home__merchantContainer paddingMedia">
        <div class="home__merchantContainer__imgContainer">
            <img class="home__merchantContainer__imgContainer__img" src="{{asset('images/merchant.webp')}}"
                 alt="Un vendeur">
        </div>
        <div class="home__merchantContainer__contentContainer">

            <h2 class="home__merchantContainer__contentContainer__title">
                {{__('front.home.inviteMerchant.title')}}
            </h2>
            <p class="home__merchantContainer__contentContainer__content">
                {{__('front.home.inviteMerchant.content')}}
            </p>
            <a href=""
               class="button button--icon home__merchantContainer__contentContainer__button"> {{__('front.home.inviteMerchant.button')}}
                <x-svg.svg class="home__merchantContainer__contentContainer__button__svg" name="arrow"/>
            </a></div>
    </section>
</div>
