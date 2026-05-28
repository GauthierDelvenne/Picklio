<x-auth.pageContainer wire="login">
    <div class="login">
        <h1 class="login__title">{{__('front.login.title')}}</h1>
        <x-form.input div-class="login__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}" required="true"
                      type="email" model="form.email" placeholder="johndoe@gmail.com"
                      input-class="login__inputContainer__input"
                      input-error-class="login__inputContainer__input__error"/>
        <div x-data="{ show: false }">
            <x-form.input div-class="register__inputContainer" name="password"
                          label="{!!__('auth.form.password.label')!!}" required="true" eye-icon="true"
                          x-bind:type="show ? 'text' : 'password'" model="form.password"
                          placeholder="{{__('auth.form.password.placeholder')}}"
                          input-class="register__inputContainer__input"
                          input-error-class="register__inputContainer__input__error"
                          forgetPassword="login__inputContainer__forgetPassword">
                <x-svg.svg title="{{__('svgTitle.eye')}}" class="register__inputContainer__svg"
                           name="eye"
                           x-show="!show"
                           x-on:click="show = !show"/>
                <x-svg.svg title="{{__('svgTitle.eye-slash')}}" class="register__inputContainer__svg"
                           name="eye-slash"
                           x-show="show"
                           x-on:click="show = !show"/>
            </x-form.input>
        </div>
        <x-form.checkbox div-class="login__checkboxContainer" name="remember"
                         label="{{__('auth.form.remember.label')}}"
                         model="form.remember"
                         input-class="login__checkboxContainer__checkbox"
                         input-error-class="login__checkboxContainer__checkbox__error"/>

        <button type="submit" class="button button--icon login__button">
            {{__('auth.form.button.login')}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="login__button__svg" name="arrow"/>
        </button>
        <p class="login__noAccount">{{__('front.login.no-account')}}
            <a href="{{route('auth.register')}}"
               class="login__noAccount__link">{{__('front.login.register')}}</a>
        </p>
    </div>
</x-auth.pageContainer>
