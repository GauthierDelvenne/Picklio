<div class="merchant paddingMedia">
    <section class="merchant__merchantContainer paddingMedia">
        <div class="merchant__merchantContainer__imgContainer">
            <img class="merchant__merchantContainer__imgContainer__img" src="{{asset('images/merchant.webp')}}"
                 alt="Un vendeur">
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
                <x-svg.svg class="merchant__merchantContainer__contentContainer__button__svg" name="arrow"/>
            </a></div>
    </section>
    <section class="merchant__cardContainer paddingMedia">
        <h2 class="merchant__cardContainer__title">{{__('front.merchant.cardContainer.title')}}</h2>
        <div x-data="{ active: 1 }" class="merchant__cardContainer__container">
            <article :class="{ 'active': active === 1 }" class="merchant__cardContainer__container__itemContainer">
                <div class="merchant__cardContainer__container__itemContainer__titleContainer">
                    <h3 class="merchant__cardContainer__container__itemContainer__titleContainer__title">{{__('front.merchant.cardContainer.1.title')}}</h3>
                    <x-svg.svg x-on:click="active = active === 1 ? null : 1"
                               class="merchant__cardContainer__container__itemContainer__titleContainer__svg"
                               name="arrow"/>
                </div>
                <div x-cloak x-show="active === 1"
                     class="merchant__cardContainer__container__itemContainer__contentContainer">
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__title">{!!__('front.merchant.cardContainer.1.content.title')!!}</p>
                    <ul class="merchant__cardContainer__container__itemContainer__contentContainer__liste">
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.1.content.ulItem.1')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.1.content.ulItem.2')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.1.content.ulItem.3')}}</li>
                    </ul>
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__content">{{__('front.merchant.cardContainer.1.content.endText')}}</p>
                </div>
            </article>
            <article :class="{ 'active': active === 2 }" class="merchant__cardContainer__container__itemContainer">
                <div class="merchant__cardContainer__container__itemContainer__titleContainer">
                    <h3 class="merchant__cardContainer__container__itemContainer__titleContainer__title">{{__('front.merchant.cardContainer.2.title')}}</h3>
                    <x-svg.svg x-on:click="active = active === 2 ? null : 2"
                               class="merchant__cardContainer__container__itemContainer__titleContainer__svg"
                               name="arrow"/>
                </div>
                <div x-cloak x-show="active === 2"
                     class="merchant__cardContainer__container__itemContainer__contentContainer">
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__title">{!!__('front.merchant.cardContainer.2.content.title')!!}</p>
                    <ul class="merchant__cardContainer__container__itemContainer__contentContainer__liste">
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.2.content.ulItem.1')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.2.content.ulItem.2')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.2.content.ulItem.3')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.2.content.ulItem.4')}}</li>
                    </ul>
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__content">{{__('front.merchant.cardContainer.2.content.endText')}}</p>
                </div>
            </article>
            <article :class="{ 'active': active === 3 }" class="merchant__cardContainer__container__itemContainer">
                <div class="merchant__cardContainer__container__itemContainer__titleContainer">
                    <h3 class="merchant__cardContainer__container__itemContainer__titleContainer__title">{{__('front.merchant.cardContainer.3.title')}}</h3>
                    <x-svg.svg x-on:click="active = active === 3 ? null : 3"
                               class="merchant__cardContainer__container__itemContainer__titleContainer__svg"
                               name="arrow"/>
                </div>
                <div x-cloak x-show="active === 3"
                     class="merchant__cardContainer__container__itemContainer__contentContainer">
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__title">{!!__('front.merchant.cardContainer.3.content.title')!!}</p>
                    <ul class="merchant__cardContainer__container__itemContainer__contentContainer__liste">
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.3.content.ulItem.1')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.3.content.ulItem.2')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.3.content.ulItem.3')}}</li>
                    </ul>
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__content">{{__('front.merchant.cardContainer.3.content.endText')}}</p>
                </div>
            </article>
            <article :class="{ 'active': active === 4 }" class="merchant__cardContainer__container__itemContainer">
                <div class="merchant__cardContainer__container__itemContainer__titleContainer">
                    <h3 class="merchant__cardContainer__container__itemContainer__titleContainer__title">{{__('front.merchant.cardContainer.4.title')}}</h3>
                    <x-svg.svg x-on:click="active = active === 4 ? null : 4"
                               class="merchant__cardContainer__container__itemContainer__titleContainer__svg"
                               name="arrow"/>
                </div>
                <div x-cloak x-show="active === 4"
                     class="merchant__cardContainer__container__itemContainer__contentContainer">
                    <p class="merchant__cardContainer__container__itemContainer__contentContainer__title">{!!__('front.merchant.cardContainer.4.content.title')!!}</p>
                    <ul class="merchant__cardContainer__container__itemContainer__contentContainer__liste">
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.4.content.ulItem.1')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.4.content.ulItem.2')}}</li>
                        <li class="merchant__cardContainer__container__itemContainer__contentContainer__liste__item">{{__('front.merchant.cardContainer.4.content.ulItem.3')}}</li>
                    </ul>
                </div>
            </article>
        </div>
    </section>
    <section class="merchant__contactSection paddingMedia">
        <h2 class="merchant__contactSection__title">{{__('front.merchant.contactSection.title')}}</h2>
        <div class="merchant__contactSection__blockContainer">
            <div class="merchant__contactSection__blockContainer__informationContainer">
                <p class="merchant__contactSection__blockContainer__informationContainer__title">{{__('front.merchant.contactSection.informationContainer.title')}}</p>
                <p class="merchant__contactSection__blockContainer__informationContainer__content">{!!__('front.merchant.contactSection.informationContainer.content')!!}</p>
                <p class="merchant__contactSection__blockContainer__informationContainer__info">{!!__('front.merchant.contactSection.informationContainer.address')!!}</p>
                <p class="merchant__contactSection__blockContainer__informationContainer__info"><a href="tel:{{$warehouse->phone}}">{{$warehouse->phone}}</a></p>
                <p class="merchant__contactSection__blockContainer__informationContainer__info"><a href="mailto:{{$warehouse->email}}">{{$warehouse->email}}</a></p>
            </div>
            <div x-data="{ show: false }" x-on:form-sent.window="show = true; setTimeout(() => show = false, 3000)"
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

                    <button type="submit"
                            class="button button--icon merchant__contactSection__blockContainer__formContainer__form__button">
                        {{__('front.merchant.contactSection.contactContainer.form.button')}}
                        <x-svg.svg class="merchant__contactSection__blockContainer__formContainer__form__button__svg"
                                   name="arrow"/>
                    </button>
                </x-form.form>
                <div
                    x-show="show"
                    x-transition
                    class="toast"
                >
                    {{__('front.merchant.contactSection.contactContainer.toast.create.success')}}
                </div>
            </div>
        </div>
    </section>
</div>
