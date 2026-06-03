<div class="merchant paddingMedia">
    <section class="merchant__merchantContainer paddingMedia">
        <div class="merchant__merchantContainer__imgContainer">
            <img
                src="{{asset('images/merchant.webp')}}"
                srcset="{{asset('images/merchant-300.webp')}} 300w, {{asset('images/merchant-600.webp')}} 600w,{{asset('images/merchant-900.webp')}} 900w"
                sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                alt="{{__('front.merchant.img')}}" class="merchant__merchantContainer__imgContainer__img">
        </div>
        <div class="merchant__merchantContainer__contentContainer">

            <h2 class="merchant__merchantContainer__contentContainer__title">
                {{__('front.merchant.title')}}
            </h2>
            <p class="merchant__merchantContainer__contentContainer__content">
                {!!__('front.merchant.content')!!}
            </p>
            <a href="#form"
               class="button button--icon merchant__merchantContainer__contentContainer__button"> {{__('front.merchant.button')}}
                <x-svg.svg title="{{__('svgTitle.arrow')}}"
                           class="merchant__merchantContainer__contentContainer__button__svg" name="arrow"/>
            </a></div>
    </section>
    <section class="merchant__cardContainer paddingMedia">
        <h2 class="merchant__cardContainer__title">{{__('front.merchant.cardContainer.title')}}</h2>
        <div x-data="{ active: 1 }" class="merchant__cardContainer__container">
            <x-front.accordionItem position="1"/>
            <x-front.accordionItem position="2"/>
            <x-front.accordionItem position="3"/>
            <x-front.accordionItem position="4"/>
        </div>
    </section>
    <section class="merchant__partContainer paddingMedia">
        <h2 class="merchant__partContainer__title">{{__('front.merchant.partContainer.title')}}</h2>
        <p class="merchant__partContainer__content">{{__('front.merchant.partContainer.content')}}</p>
        <div class="merchant__partContainer__cardContainer">
            <div class="merchant__partContainer__cardContainer__commissionContainer">
                <p class="merchant__partContainer__cardContainer__commissionContainer__percentage">10%</p>
                <div class="merchant__partContainer__cardContainer__commissionContainer__textContainer">
                    <p class="merchant__partContainer__cardContainer__commissionContainer__textContainer__title">{{__('front.merchant.partContainer.commissionContainer.title')}}</p>
                    <p class="merchant__partContainer__cardContainer__commissionContainer__textContainer__content">{{__('front.merchant.partContainer.commissionContainer.content')}}</p>
                </div>
            </div>
            <div class="merchant__partContainer__cardContainer__exampleContainer">
                <p class="merchant__partContainer__cardContainer__exampleContainer__title">{{__('front.merchant.partContainer.exampleContainer.title')}}</p>
                <x-front.titleTexteContainer number="1" class="example"/>
                <x-front.titleTexteContainer number="2" class="example"/>
                <x-front.titleTexteContainer number="3" class="example"/>
            </div>
        </div>
        <x-front.titleTexteContainer number="1" class="faq"/>
        <hr>
        <x-front.titleTexteContainer number="2" class="faq"/>
        <hr>
        <x-front.titleTexteContainer number="3" class="faq"/>
    </section>
    <section class="merchant__contactSection paddingMedia" itemscope itemtype="https://schema.org/LocalBusiness">
        <h2 class="merchant__contactSection__title">{{__('front.merchant.contactSection.title')}}</h2>
        <div class="merchant__contactSection__blockContainer">
            <div class="merchant__contactSection__blockContainer__informationContainer">
                <p class="merchant__contactSection__blockContainer__informationContainer__title">{{__('front.merchant.contactSection.informationContainer.title')}}</p>
                <p class="merchant__contactSection__blockContainer__informationContainer__content">{!!__('front.merchant.contactSection.informationContainer.content')!!}</p>
                <p class="merchant__contactSection__blockContainer__informationContainer__info"
                   itemprop="address">{!!__('front.merchant.contactSection.informationContainer.address')!!}</p>
                <p class="merchant__contactSection__blockContainer__informationContainer__info"><a
                        href="tel:{{$warehouse->phone}}" itemprop="telephone">{{$warehouse->phone}}</a></p>
                <p class="merchant__contactSection__blockContainer__informationContainer__info"><a
                        href="mailto:{{$warehouse->email}}" itemprop="email">{{$warehouse->email}}</a></p>
            </div>
            <div id="form" x-data="{ show: false }"
                 x-on:form-sent.window="show = true; setTimeout(() => show = false, 3000)"
                 class="merchant__contactSection__blockContainer__formContainer">
                <x-form.form wire-submit="sendMessage"
                             class="merchant__contactSection__blockContainer__formContainer__form">
                    <div class="merchant__contactSection__blockContainer__formContainer__form__container">
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="firstname"
                            label="{{__('front.merchant.contactSection.contactContainer.form.firstname.label')}}"
                            required="true"
                            type="text" model="form.firstname"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.firstname.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="lastname"
                            label="{{__('front.merchant.contactSection.contactContainer.form.lastname.label')}}"
                            required="true"
                            type="text" model="form.lastname"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.lastname.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                    </div>
                    <div class="merchant__contactSection__blockContainer__formContainer__form__container">
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="name"
                            label="{{__('front.merchant.contactSection.contactContainer.form.name.label')}}"
                            required="true"
                            type="text" model="form.name"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.name.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="email"
                            label="{{__('front.merchant.contactSection.contactContainer.form.email.label')}}"
                            required="true"
                            type="email" model="form.email"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.email.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                    </div>
                    <div class="merchant__contactSection__blockContainer__formContainer__form__container">
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="description"
                            label="{{__('front.merchant.contactSection.contactContainer.form.description.label')}}"
                            required="true"
                            type="text" model="form.description"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.description.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="address"
                            label="{{__('front.merchant.contactSection.contactContainer.form.address.label')}}"
                            required="true"
                            type="text" model="form.address"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.address.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                    </div>
                    <div class="merchant__contactSection__blockContainer__formContainer__form__container">
                        <x-form.input
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="postal_code"
                            label="{{__('front.merchant.contactSection.contactContainer.form.postal_code.label')}}"
                            required="true"
                            type="text" model="form.postal_code"
                            placeholder="{{__('front.merchant.contactSection.contactContainer.form.postal_code.label')}}"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error"/>
                        <x-form.select
                            div-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer"
                            name="country"
                            label="{{__('front.merchant.contactSection.contactContainer.form.country.label')}}"
                            model="form.country" required="true"
                            input-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input"
                            input-error-class="merchant__contactSection__blockContainer__formContainer__form__container__inputContainer__input__error">
                            @foreach($this->countries as $code => $name)
                                <option value="{{$code}}">{{$name}}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    <x-form.button type="submit"
                                   class="merchant__contactSection__blockContainer__formContainer__form__button"/>
                </x-form.form>
                <x-front.toast show="show"
                               :title="__('front.merchant.contactSection.contactContainer.toast.create.success')"/>
            </div>
        </div>
    </section>
</div>
