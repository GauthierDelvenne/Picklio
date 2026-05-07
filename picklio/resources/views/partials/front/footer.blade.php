<footer class="footer paddingMedia">
    <div class="footer__mandatoryContainer">
        <div class="footer__mandatoryContainer__imgContainer">
            <a href="{{route('front.home')}}">
                <img src="{{asset('images/logo-name.svg')}}" alt="Description de l'image"
                     class="footer__mandatoryContainer__imgContainer__img">
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
            <li class="footer__infoContainer__liste__item">{{__('front.footer.schedule.open', ['open' => $open, 'close' => $close])}}</li>
            <li class="footer__infoContainer__liste__item">{{__('front.footer.schedule.close')}}</li>
        </ul>
    </div>
    <div class="footer__infoContainer">
        <p class="footer__infoContainer__title">{{__('front.footer.contact.title')}}</p>
        <ul class="footer__infoContainer__liste">
            <li class="footer__infoContainer__liste__item">{{$warehouse->address}} <br> {{$warehouse->postal_code}}</li>
            <li class="footer__infoContainer__liste__item"><a class="footer__infoContainer__liste__item__link"
                                                              href="tel:{{$warehouse->phone}}">{{$warehouse->phone}}</a>
            </li>
            <li class="footer__infoContainer__liste__item"><a class="footer__infoContainer__liste__item__link"
                                                              href="mailto:{{$warehouse->email}}">{{$warehouse->email}}</a>
            </li>
        </ul>
    </div>
</footer>
