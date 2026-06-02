<footer class="footer paddingMedia" itemscope itemtype="https://schema.org/LocalBusiness">
    <meta itemprop="name" content="{{ config('app.name') }}" />
    <meta itemprop="url" content="{{ route('front.home') }}" />
    <div class="footer__mandatoryContainer">
        <div class="footer__mandatoryContainer__imgContainer">
            <a href="{{route('front.home')}}">
                <img src="{{asset('images/logo-name.svg')}}" alt="Description de l'image"
                     class="footer__mandatoryContainer__imgContainer__img" itemprop="logo">
            </a>
        </div>
        <p class="footer__mandatoryContainer__text">
            <a href="{{route('front.legal-notice')}}"
               class="footer__mandatoryContainer__text__link">{{__('front.footer.legal-notice')}}</a> -
            <a href="{{route('front.privacy-policy')}}"
               class="footer__mandatoryContainer__text__link">{{__('front.footer.privacy-policy')}}</a> -
            © 2026
        </p>
    </div>
    <div class="footer__infoContainer">
        <p class="footer__infoContainer__title">{{__('front.footer.schedule.title')}}</p>
        <ul class="footer__infoContainer__liste">
            <li class="footer__infoContainer__liste__item" itemprop="openingHours">{{__('front.footer.schedule.open', ['open' => $open, 'close' => $close])}}</li>
            <li class="footer__infoContainer__liste__item">{{__('front.footer.schedule.close')}}</li>
        </ul>
    </div>
    <div class="footer__infoContainer">
        <p class="footer__infoContainer__title">{{__('front.footer.contact.title')}}</p>
        <ul class="footer__infoContainer__liste">
            <li class="footer__infoContainer__liste__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress"><span itemprop="streetAddress">{{$warehouse->address}}</span> <br> <span itemprop="postalCode">{{$warehouse->postal_code}}</span></li>
            <li class="footer__infoContainer__liste__item"><a class="footer__infoContainer__liste__item__link"
                                                              href="tel:{{$warehouse->phone}}" itemprop="telephone">{{$warehouse->phone}}</a>
            </li>
            <li class="footer__infoContainer__liste__item"><a class="footer__infoContainer__liste__item__link"
                                                              href="mailto:{{$warehouse->email}}" itemprop="email">{{$warehouse->email}}</a>
            </li>
        </ul>
    </div>
</footer>
