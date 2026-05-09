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
    <x-front.productList :products="$this->products" title="{{__('front.home.alimentaryList.title')}}"
                         button="{{__('front.home.alimentaryList.button')}}"/>
</div>
