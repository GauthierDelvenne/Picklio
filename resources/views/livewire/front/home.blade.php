<div class="home">
    <section class="home__introContainer paddingMedia">
        <div class="home__introContainer__contentContainer">
            <h2 class="home__introContainer__contentContainer__title">{{__('front.home.intro.title')}}</h2>
            <p class="home__introContainer__contentContainer__content">{{__('front.home.intro.content')}}</p>
            <div class="home__introContainer__contentContainer__buttonContainer">
                <a href="{{route('front.catalogue.index')}}"
                   class="button button--icon home__introContainer__contentContainer__buttonContainer__button">{{__('front.home.intro.buttonDiscover')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}"
                               class="home__introContainer__contentContainer__buttonContainer__button__svg"
                               name="arrow"/>
                </a>
                <a href="{{ route('front.merchant') }}"
                   class="button button--icon home__introContainer__contentContainer__buttonContainer__button">{{__('front.home.intro.buttonJoin')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}"
                               class="home__introContainer__contentContainer__buttonContainer__button__svg"
                               name="arrow"/>
                </a>
            </div>
            <ul class="home__introContainer__contentContainer__liste">
                <x-front.introQuality number="1"/>
                <x-front.introQuality number="2"/>
                <x-front.introQuality number="3"/>
            </ul>
        </div>
        <div class="home__introContainer__imgContainer">
            <img
                src="{{asset('images/landing.webp')}}"
                srcset="{{asset('images/landing-300.webp')}} 300w, {{asset('images/landing-600.webp')}} 600w,{{asset('images/landing-900.webp')}} 900w"
                sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                alt="Picklio" class="imgContainer__img">
        </div>
    </section>
    <x-front.howItWork/>
    <div class="home__categoriesSelectContainer">
        <div class="home__categoriesSelectContainer__buttonContainer">
            <button
                class="button button--tabs home__categoriesSelectContainer__buttonContainer__button @if($activeTab == 'alimentaire') active @endif"
                wire:click="changeTab('alimentaire')">{{__('front.home.alimentaryList.tabs')}}</button>
            <button
                class="button button--tabs home__categoriesSelectContainer__buttonContainer__button @if($activeTab == 'non-alimentaire') active @endif"
                wire:click="changeTab('non-alimentaire')">{{__('front.home.noAlimentaryList.tabs')}}</button>
        </div>

        @if($activeTab == 'alimentaire')
            <x-front.productList :products="$this->alimentaryProducts" title="{{__('front.home.alimentaryList.title')}}"
                                 button="{{__('front.home.alimentaryList.button')}}"/>
        @elseif($activeTab == 'non-alimentaire')
            <x-front.productList :products="$this->noAlimentaryProducts"
                                 title="{{__('front.home.noAlimentaryList.title')}}"
                                 button="{{__('front.home.noAlimentaryList.button')}}"/>
        @endif
        <section class="home__categoriesSelectContainer__productCategories paddingMedia">
            <div class="home__categoriesSelectContainer__productCategories__titleContainer">
                <h2 class="home__categoriesSelectContainer__productCategories__titleContainer__title">{{__('front.home.productCategories.title')}}</h2>

            </div>
            {{--                TODO REVOIR HOMOGÉNÉITÉ PICTOS--}}
            <div class="home__categoriesSelectContainer__productCategories__categoryContainer">
                @foreach( $activeTab == 'alimentaire' ?
                            $this->alimentaryCategories :
                            $this->noAlimentaryCategories as $id => $category)
                    <x-front.productCategoryCard name="{{$category}}"
                                                 wire-click="goToCategory({{ $id }})"
                                                 title="{!!__('client.products.categories.'.$id)!!}"/>
                @endforeach
            </div>

        </section>
    </div>
    <hr class="home__hr">
    <section id="merchant" class="home__merchantContainer paddingMedia">
        <div class="home__merchantContainer__imgContainer">
            <img
                src="{{asset('images/merchant.webp')}}"
                srcset="{{asset('images/merchant-300.webp')}} 300w, {{asset('images/merchant-600.webp')}} 600w,{{asset('images/merchant-900.webp')}} 900w"
                sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                alt="{{__('front.merchant.img')}}" class="merchant__merchantContainer__imgContainer__img">
        </div>
        <div class="home__merchantContainer__contentContainer">

            <h2 class="home__merchantContainer__contentContainer__title">
                {{__('front.home.inviteMerchant.title')}}
            </h2>
            <p class="home__merchantContainer__contentContainer__content">
                {{__('front.home.inviteMerchant.content')}}
            </p>
            <a href="{{route('front.merchant')}}"
               class="button button--icon home__merchantContainer__contentContainer__button"> {{__('front.home.inviteMerchant.button')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}"
                           class="home__merchantContainer__contentContainer__button__svg" name="arrow"/>
            </a>
        </div>
    </section>
</div>
