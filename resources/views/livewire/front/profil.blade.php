<div class="profil">
    <section x-data="{ open: false, showSuccess: false, openPassword: false }"
             x-on:update.window="openPassword= false; open = false; showSuccess = true; setTimeout(() => showSuccess = false, 3000)"
             class="profil__informationContainer paddingMedia">
        <div class="profil__informationContainer__cardContainer">
            <div class="profil__informationContainer__cardContainer__card">
                <h2 class="profil__informationContainer__cardContainer__card__title">{{__('front.profil.informationContainer.title')}}</h2>
                @if(!empty($userConnected) && !empty($userConnected->account))
                    <p class="profil__informationContainer__cardContainer__card__text">
                        <span class="profil__informationContainer__cardContainer__card__text__span">{{__('front.profil.informationContainer.form.firstname.label')}} :</span> {{$userConnected->account->firstname}}
                    </p>
                    <p class="profil__informationContainer__cardContainer__card__text">
                        <span class="profil__informationContainer__cardContainer__card__text__span">{{__('front.profil.informationContainer.form.lastname.label')}} :</span> {{$userConnected->account->lastname}}
                    </p>
                    <p class="profil__informationContainer__cardContainer__card__text">
                        <span class="profil__informationContainer__cardContainer__card__text__span">{{__('front.profil.informationContainer.form.email.label')}} :</span> {{$userConnected->account->email}}
                    </p>
                    <p class="profil__informationContainer__cardContainer__card__text">
                        <span class="profil__informationContainer__cardContainer__card__text__span">{{__('front.profil.informationContainer.form.phone.label')}} :</span> {{$userConnected->account->phone}}
                    </p>
                @else
                    <p class="profil__informationContainer__cardContainer__card__text">{{__('front.profil.informationContainer.empty')}}</p>
                @endif
            </div>
            @if(!empty($userConnected))
                <div class="profil__informationContainer__cardContainer__buttonContainer">
                    <button x-on:click="open = true"
                            class="button button--icon profil__informationContainer__cardContainer__buttonContainer__button">
                        {{__('front.profil.informationContainer.edit-profil')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                                   class="profil__informationContainer__cardContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    </button>
                    <button x-on:click="openPassword = true"
                            class="button button--icon profil__informationContainer__cardContainer__buttonContainer__button">
                        {{__('front.profil.informationContainer.edit-password')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                                   class="profil__informationContainer__cardContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    </button>
                </div>
            @else
                <div class="profil__informationContainer__cardContainer__buttonContainer">
                    <a href="{{ route('auth.login') }}"
                       class="button button--icon profil__informationContainer__cardContainer__buttonContainer__button">
                        {{__('auth.form.button.login')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                                   class="profil__informationContainer__cardContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    </a>
                    <a href="{{ route('auth.register') }}"
                       class="button button--icon profil__informationContainer__cardContainer__buttonContainer__button">
                        {{__('auth.form.button.register')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}"
                                   class="profil__informationContainer__cardContainer__buttonContainer__button__svg"
                                   name="arrow"/>
                    </a>
                </div>
            @endif

        </div>
        <div x-show="open" x-cloak
             class="modal--overlay profil__informationContainer__modalContainer">
            <x-form wire-submit="update"
                    class="modal profil__informationContainer__modalContainer__form">
                <button type="button" x-on:click="open = false">
                    <x-svg.svg title="{{__('svgTitle.close')}}"
                               class="profil__informationContainer__modalContainer__form__svg"
                               name="plus"/>
                </button>
                <x-form.input
                    div-class="profil__informationContainer__modalContainer__form__inputContainer"
                    name="firstname"
                    label="{{__('front.profil.informationContainer.form.firstname.label')}}" required="true"
                    type="text" model="form.firstname"
                    placeholder="{{__('front.profil.informationContainer.form.firstname.label')}}"
                    input-class="profil__informationContainer__modalContainer__form__inputContainer__input"
                    input-error-class="profil__informationContainer__modalContainer__form__inputContainer__input__error"/>

                <x-form.input
                    div-class="profil__informationContainer__modalContainer__form__inputContainer"
                    name="lastname"
                    label="{{__('front.profil.informationContainer.form.lastname.label')}}" required="true"
                    type="text" model="form.lastname"
                    placeholder="{{__('front.profil.informationContainer.form.lastname.label')}}"
                    input-class="profil__informationContainer__modalContainer__form__inputContainer__input"
                    input-error-class="profil__informationContainer__modalContainer__form__inputContainer__input__error"/>

                <x-form.input
                    div-class="profil__informationContainer__modalContainer__form__inputContainer"
                    name="email"
                    label="{{__('front.profil.informationContainer.form.email.label')}}" required="true"
                    type="email" model="form.email"
                    placeholder="{{__('front.profil.informationContainer.form.email.label')}}"
                    input-class="profil__informationContainer__modalContainer__form__inputContainer__input"
                    input-error-class="profil__informationContainer__modalContainer__form__inputContainer__input__error"/>
                <x-form.input
                    div-class="profil__informationContainer__modalContainer__form__inputContainer"
                    name="phone"
                    label="{{__('front.profil.informationContainer.form.phone.label')}}"
                    type="tel" model="form.phone"
                    placeholder="{{__('front.profil.informationContainer.form.phone.label')}}"
                    input-class="profil__informationContainer__modalContainer__form__inputContainer__input"
                    input-error-class="profil__informationContainer__modalContainer__form__inputContainer__input__error"/>
                <button type="submit"
                        class="button button--icon profil__informationContainer__modalContainer__form__button">
                    {{__('front.profil.informationContainer.edit-profil')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}"
                               class="profil__informationContainer__modalContainer__form__button__svg"
                               name="arrow"/>
                </button>
            </x-form>
        </div>
        <div x-show="openPassword" x-cloak
             class="modal--overlay profil__informationContainer__modalContainer">
            <x-form wire-submit="updatePassword"
                    class="modal profil__informationContainer__modalContainer__form">
                <button type="button" x-on:click="openPassword = false">
                    <x-svg.svg title="{{__('svgTitle.close')}}"
                               class="profil__informationContainer__modalContainer__form__svg"
                               name="plus"/>
                </button>
                <x-form.input
                    div-class="profil__informationContainer__modalContainer__form__inputContainer"
                    name="current_password"
                    label="{{__('front.profil.informationContainer.form.current_password.label')}}" required="true"
                    type="text" model="formPassword.current_password"
                    placeholder="{{__('front.profil.informationContainer.form.current_password.label')}}"
                    input-class="profil__informationContainer__modalContainer__form__inputContainer__input"
                    input-error-class="profil__informationContainer__modalContainer__form__inputContainer__input__error"/>
                <x-form.input
                    div-class="profil__informationContainer__modalContainer__form__inputContainer"
                    name="password"
                    label="{{__('front.profil.informationContainer.form.password.label')}}" required="true"
                    type="text" model="formPassword.password"
                    placeholder="{{__('front.profil.informationContainer.form.password.label')}}"
                    input-class="profil__informationContainer__modalContainer__form__inputContainer__input"
                    input-error-class="profil__informationContainer__modalContainer__form__inputContainer__input__error"/>
                <p class="profil__informationContainer__modalContainer__form__reset"><a
                        class="profil__informationContainer__modalContainer__form__reset__link"
                        href="{{ route('auth.password.forget-password') }}">{{__('front.profil.informationContainer.forget-password')}} </a>
                </p>
                <button type="submit"
                        class="button button--icon profil__informationContainer__modalContainer__form__button">
                    {{__('front.profil.informationContainer.edit-password')}}
                    <x-svg.svg title="{{__('svgTitle.arrow')}}"
                               class="profil__informationContainer__modalContainer__form__button__svg"
                               name="arrow"/>
                </button>
            </x-form>
        </div>
        <div
            x-show="showSuccess"
            x-transition
            class="toast"
            x-cloak
        >
            {{__('front.profil.informationContainer.toast-profil')}}
        </div>
    </section>
    @if(!empty($userConnected))
        <section class="profil__order paddingMedia">
            <h2 class="profil__order__title">{{__('front.profil.order.title')}}</h2>
            @forelse($this->orders() as $order)
                <div class="profil__order__cardContainer">
                    <p class="profil__order__cardContainer__text">#{{$order->code}}</p>
                    <p class="profil__order__cardContainer__text">
                        {{\Carbon\Carbon::parse($order->pickup_date)->translatedFormat('l d M,')}} {{\Carbon\Carbon::parse($order->pickupSlot->time)->format('H\hi')}}
                    </p>
                    <p class="profil__order__cardContainer__text">{{$order->priceFormatted}}</p>
                    <a href="{{ route('front.order.show', $order->uuid) }}" class="button button--icon profil__order__cardContainer__button">
                        {{__('front.profil.order.details')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}" class="profil__order__cardContainer__button__svg" name="arrow"/>
                    </a>
                </div>
                @if($loop->last)
                    <a href="{{ route('front.order.index') }}" class="button button--icon profil__order__button">
                        {{__('front.profil.order.see-more')}}
                        <x-svg.svg title="{{__('svgTitle.arrow')}}" class="profil__order__button__svg" name="arrow"/>
                    </a>
                @endif
            @empty
                <p class="profil__order__empty">
                    {{__('admin.commons.empty')}}
                </p>
            @endforelse
        </section>
    @endif
    @if(!empty($userConnected))
        <section x-data="{ open: false, deleteAccount: false }"
                 x-on:deleteAccount.window="open = false; deleteAccount = true; setTimeout(() => deleteAccount = false, 3000)"
                 class="profil__account paddingMedia">
            <h2 class="profil__account__title">{{__('front.profil.account.title')}}</h2>
            <div class="profil__account__buttonContainer">
                <button wire:click="logout"
                        class="button profil__account__buttonContainer__button">{{__('front.profil.account.disconnect')}}</button>
                <button x-on:click="open = true"
                        class="button button--danger profil__account__buttonContainer__button">{{__('front.profil.account.delete')}}</button>
            </div>
            <div x-show="open" x-cloak
                 class="modal--overlay profil__account__modalContainer">
                <div class="modal profil__account__modalContainer__modal">
                    <button type="button" x-on:click="open = false"
                            class="profil__account__modalContainer__modal__button">
                        <x-svg.svg title="{{__('svgTitle.close')}}"
                                   class="profil__account__modalContainer__modal__button__svg"
                                   name="plus"/>
                    </button>
                    <p class="profil__account__modalContainer__modal__text">{!!__('front.profil.account.delete-message')!!}</p>
                    <button wire:click="delete"
                            class="button button--danger profil__account__button">{{__('front.profil.account.delete')}}</button>
                </div>
            </div>
            <div
                x-show="deleteAccount"
                x-transition
                class="toast"
                x-cloak
            >
                {{__('front.profil.informationContainer.toast-delete')}}
            </div>
        </section>
    @endif
</div>
