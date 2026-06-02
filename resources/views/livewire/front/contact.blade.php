<div class="contact">
    <section class="contact__informationContainer paddingMedia"  itemscope itemtype="https://schema.org/LocalBusiness">
        <div class="contact__informationContainer__card">
            <h2 class="contact__informationContainer__card__title">{{__('front.contact.informationContainer.title')}}</h2>
            <p class="contact__informationContainer__card__text">{{__('front.contact.informationContainer.text')}}</p>
            <ul class="contact__informationContainer__card__liste">
                <li class="contact__informationContainer__card__liste__item" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <x-svg.svg title="{{__('svgTitle.address')}}" class="contact__informationContainer__card__liste__item__link__svg" name="address"/>
                    <span itemprop="streetAddress">{{$warehouse->address}}</span>
                    <span itemprop="postalCode">{{$warehouse->postal_code}}
                </li>
                <li class="contact__informationContainer__card__liste__item"><a
                        class="contact__informationContainer__card__liste__item__link"
                        href="tel:{{$warehouse->phone}}" itemprop="telephone">
                        <x-svg.svg  title="{{__('svgTitle.phone')}}" class="contact__informationContainer__card__liste__item__link__svg" name="phone"/>
                        {{$warehouse->phone}}</a>
                </li>
                <li class="contact__informationContainer__card__liste__item"><a
                        class="contact__informationContainer__card__liste__item__link"
                        href="mailto:{{$warehouse->email}}" itemprop="email">
                        <x-svg.svg title="{{__('svgTitle.mail')}}" class="contact__informationContainer__card__liste__item__link__svg" name="mail"/>
                        {{$warehouse->email}}</a>
                </li>
            </ul>
        </div>
        <div class="contact__informationContainer__card">
            <p class="contact__informationContainer__card__title">{{__('front.contact.informationContainer.card.title')}}</p>
            <p class="contact__informationContainer__card__text">{{__('front.contact.informationContainer.card.contact-us')}}</p>
            <p class="contact__informationContainer__card__text">{{__('front.contact.informationContainer.card.contact-them')}}</p>
        </div>
    </section>
    <section x-data="{ show: false }" x-on:send-form.window="show = true; setTimeout(() => show = false, 3000)"
             class="contact__formContainer paddingMedia">
        <div class="contact__formContainer__card">
            <h2 class="contact__formContainer__card__title">{{__('front.contact.formContainer.title')}}</h2>
            <x-form.form wire-submit="sendForm" class="contact__formContainer__card__form">
                <div class="contact__formContainer__card__form__container">
                    <x-form.input
                        div-class="contact__formContainer__card__form__container__inputContainer"
                        name="name"
                        label="{{__('front.contact.formContainer.form.name.label')}}" required="true"
                        type="text" model="form.name"
                        placeholder="{{__('front.contact.formContainer.form.name.label')}}"
                        input-class="contact__formContainer__card__form__container__inputContainer__input"
                        input-error-class="contact__formContainer__card__form__container__inputContainer__input__error"/>
                    <x-form.input
                        div-class="contact__formContainer__card__form__container__inputContainer"
                        name="email"
                        label="{{__('front.contact.formContainer.form.email.label')}}" required="true"
                        type="email" model="form.email"
                        placeholder="{{__('front.contact.formContainer.form.email.label')}}"
                        input-class="contact__formContainer__card__form__container__inputContainer__input"
                        input-error-class="contact__formContainer__card__form__container__inputContainer__input__error"/>
                </div>
                <div class="contact__formContainer__card__form__container">
                    <x-form.select
                        div-class="contact__formContainer__card__form__container__inputContainer"
                        name="recipient_id"
                        label="{{__('front.contact.formContainer.form.merchant.label')}}"
                        model="form.recipient_id"
                        placeholder="{{__('front.contact.formContainer.form.merchant.label')}}"
                        input-class="contact__formContainer__card__form__container__inputContainer__input"
                        input-error-class="contact__formContainer__card__form__container__inputContainer__input__error">
                        <option value="{{$this->form->admin_id}}">Picklio</option>
                        @foreach($this->merchants as $merchant)
                            <option value="{{$merchant->id}}">{{$merchant->user->name}}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.input
                        div-class="contact__formContainer__card__form__container__inputContainer"
                        name="phone"
                        label="{{__('front.contact.formContainer.form.phone.label')}}" required="true"
                        type="tel" model="form.phone"
                        placeholder="{{__('front.contact.formContainer.form.phone.label')}}"
                        input-class="contact__formContainer__card__form__container__inputContainer__input"
                        input-error-class="contact__formContainer__card__form__container__inputContainer__input__error"/>
                </div>
                <div class="contact__formContainer__card__form__container">
                    <x-form.input
                        div-class="contact__formContainer__card__form__container__inputContainer"
                        name="title"
                        label="{{__('front.contact.formContainer.form.title.label')}}" required="true"
                        type="text" model="form.title"
                        placeholder="{{__('front.contact.formContainer.form.title.label')}}"
                        input-class="contact__formContainer__card__form__container__inputContainer__input"
                        input-error-class="contact__formContainer__card__form__container__inputContainer__input__error"/>
                    <x-form.textarea
                        div-class="contact__formContainer__card__form__container__inputContainer"
                        name="description"
                        label="{{__('front.contact.formContainer.form.description.label')}}"
                        type="textarea" model="form.description"
                        placeholder="{{__('front.contact.formContainer.form.description.label')}}"
                        input-class="contact__formContainer__card__form__container__inputContainer__input"
                        input-error-class="contact__formContainer__card__form__container__inputContainer__input__error"/>
                </div>
                <button type="submit"
                        class="button button--icon contact__formContainer__card__form__button">
                    {{__('front.catalogue.contactSection.form.button')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}" class="contact__formContainer__card__form__button__svg"
                               name="arrow"/>
                </button>
            </x-form.form>
        </div>
        <div
            x-show="show"
            x-transition
            class="toast"
            x-cloak
        >
            {{__('front.catalogue.contactSection.toast.create.success')}}
        </div>
    </section>
</div>
