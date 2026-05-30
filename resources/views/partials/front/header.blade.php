<header class="header paddingMedia">
    <a href="{{route('front.home')}}">
        <picture class="header__imgContainer">
            <source srcset="{{asset('images/logo-name.svg')}}" media="(min-width: 768px)">
            <img src="{{asset('images/logo.svg')}}" alt="Description de l'image" class="header__imgContainer__img">
        </picture>
    </a>

    <nav class="header__navbar">
        <h2 class="sr-only">{{__('front.header.heading')}}</h2>

        <input type="checkbox" id="burger" class="header__navbar__burger-input" aria-label="Ouvrir le menu">

        <label for="burger" class="header__navbar__burger-icon">
            <span class="header__navbar__burger-icon__line header__navbar__burger-icon__line--1"></span>
            <span class="header__navbar__burger-icon__line header__navbar__burger-icon__line--2"></span>
            <span class="header__navbar__burger-icon__line header__navbar__burger-icon__line--3"></span>
        </label>
        <ul class="header__navbar__liste">
            <li class="header__navbar__liste__item">
                <a href="{{route('front.home')}}"
                   class="header__navbar__liste__item__link @if(Route::currentRouteName() === 'front.home') active @endif">
                    {{__('commons.pageName.front.home')}}
                </a>
            </li>
            <li class="header__navbar__liste__item">
                <a href="{{route('front.catalogue.index')}}"
                   class="header__navbar__liste__item__link @if(Route::currentRouteName() === 'front.catalogue.index') active @endif">
                    {{__('commons.pageName.front.catalogue')}}
                </a>
            </li>
            <li class="header__navbar__liste__item">
                <a href="{{route('front.merchant')}}"
                   class="header__navbar__liste__item__link @if(Route::currentRouteName() === 'front.merchant') active @endif">
                    {{__('commons.pageName.front.merchant')}}
                </a>
            </li>
            <li class="header__navbar__liste__item">
                <a href="{{route('front.contact')}}"
                   class="header__navbar__liste__item__link @if(Route::currentRouteName() === 'front.contact') active @endif">
                    {{__('commons.pageName.front.contact')}}
                </a>
            </li>
            <li class="header__navbar__liste__item header__navbar__liste__item--push">
                <a href="{{route('front.basket')}}"
                   class="header__navbar__liste__item__link @if(Route::currentRouteName() === 'front.basket') active @endif">
                    <x-svg.svg title="{{__('svgTitle.basket')}}" class="header__navbar__liste__item__link__svg" name="basket"/>
                    <p class="header__navbar__liste__item__link__count">{{$this->cartProductNumber}}</p>
                </a>
            </li>
            <li class="header__navbar__liste__item">
                <a href="{{route('front.profil')}}"
                   class="header__navbar__liste__item__link @if(Route::currentRouteName() === 'front.profil') active @endif">
                    <x-svg.svg title="{{__('svgTitle.profil')}}" class="header__navbar__liste__item__link__svg" name="profil"/>
                </a>
            </li>

            @if($this->is_admin)
                <li class="header__navbar__liste__item">
                    <a href="{{route('admin.dashboard')}}"
                       class="header__navbar__liste__item__link">
                        <x-svg.svg title="{{__('svgTitle.admin')}}" class="header__navbar__liste__item__link__svg" name="admin"/>
                    </a>
                </li>
            @endif
            @if($this->is_merchant)
                <li class="header__navbar__liste__item">
                    <a href="{{route('client.dashboard')}}"
                       class="header__navbar__liste__item__link">
                        <x-svg.svg title="{{__('svgTitle.admin')}}" class="header__navbar__liste__item__link__svg" name="admin"/>
                    </a>
                </li>
            @endif
            @if(empty($this->userConnected))
                <li class="header__navbar__liste__item">
                    <a href="{{route('auth.login')}}"
                       class="header__navbar__liste__item__link">
                        <x-svg.svg title="{{__('svgTitle.login')}}" class="header__navbar__liste__item__link__svg header__navbar__liste__item__link__svg--stroke" name="login"/>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
