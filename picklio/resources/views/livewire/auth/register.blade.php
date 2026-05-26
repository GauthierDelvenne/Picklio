<div class="register">
    <x-form.form wire-submit="register" class="register__formContainer">
        <h1 class="register__formContainer__title">{{__('front.register.title')}}</h1>
        <x-form.input div-class="register__formContainer__inputContainer" name="firstname"
                      label="{{__('auth.form.firstname.label')}}" required="true"
                      type="text" model="form.firstname" placeholder="{{__('auth.form.firstname.label')}}"
                      input-class="register__formContainer__inputContainer__input"
                      input-error-class="register__formContainer__inputContainer__input__error"/>

        <x-form.input div-class="register__formContainer__inputContainer" name="lastname"
                      label="{{__('auth.form.lastname.label')}}" required="true"
                      type="text" model="form.lastname" placeholder="{{__('auth.form.lastname.label')}}"
                      input-class="register__formContainer__inputContainer__input"
                      input-error-class="register__formContainer__inputContainer__input__error"/>

        <x-form.input div-class="register__formContainer__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}" required="true"
                      type="email" model="form.email" placeholder="{{__('auth.form.email.label')}}"
                      input-class="register__formContainer__inputContainer__input"
                      input-error-class="register__formContainer__inputContainer__input__error"/>
        <div x-data="{ show: false }">
            <x-form.input div-class="register__formContainer__inputContainer" name="password"
                          label="{{__('auth.form.password.label')}}" required="true" eye-icon="true"
                          x-bind:type="show ? 'text' : 'password'" model="form.password"
                          placeholder="{{__('auth.form.password.label')}}"
                          input-class="register__formContainer__inputContainer__input"
                          input-error-class="register__formContainer__inputContainer__input__error">
                <x-svg.svg title="{{__('svgTitle.eye')}}" class="register__formContainer__inputContainer__svg"
                           name="eye"
                           x-show="!show"
                           x-on:click="show = !show"/>
                <x-svg.svg title="{{__('svgTitle.eye-slash')}}" class="register__formContainer__inputContainer__svg"
                           name="eye-slash"
                           x-show="show"
                           x-on:click="show = !show"/>
            </x-form.input>
        </div>

        <button type="submit" class="button button--icon register__formContainer__button">
            {{__('auth.form.button.register')}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="register__formContainer__button__svg" name="arrow"/>
        </button>
        <p class="register__formContainer__alreadyAccount">{{__('front.register.already-account')}}
            <a href="{{route('auth.login')}}"
               class="register__formContainer__alreadyAccount__link">{{__('front.register.login')}}</a>
        </p>

    </x-form.form>
    <div class="register__addInformation">
    <x-auth.imgContainer/>
        <p class="register__addInformation__text">Un compte vous permet de composer votre panier, choisir votre créneau de retrait et recevoir votre confirmation par email. Vous ne payez qu'au moment du retrait, sur place.</p>
    </div>
</div>
