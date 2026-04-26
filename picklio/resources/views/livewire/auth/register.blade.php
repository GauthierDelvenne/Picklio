<div class="register">
    <x-form.form wire-submit="register" class="register__formContainer">
        <h1 class="register__formContainer__title">{{__('front.register.title')}}</h1>
        <x-form.input div-class="register__formContainer__inputContainer" name="firstname"
                      label="{{__('auth.form.firstname.label')}}"
                      type="text" model="form.firstname" placeholder="{{__('auth.form.firstname.label')}}"
                      input-class="register__formContainer__inputContainer__input"
                      input-error-class="register__formContainer__inputContainer__input__error"/>

        <x-form.input div-class="register__formContainer__inputContainer" name="lastname"
                      label="{{__('auth.form.lastname.label')}}"
                      type="text" model="form.lastname" placeholder="{{__('auth.form.lastname.label')}}"
                      input-class="register__formContainer__inputContainer__input"
                      input-error-class="register__formContainer__inputContainer__input__error"/>

        <x-form.input div-class="register__formContainer__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}"
                      type="email" model="form.email" placeholder="{{__('auth.form.email.label')}}"
                      input-class="register__formContainer__inputContainer__input"
                      input-error-class="register__formContainer__inputContainer__input__error"/>
        <div x-data="{ show: false }">
            <x-form.input div-class="register__formContainer__inputContainer" name="password"
                          label="{{__('auth.form.password.label')}}"
                          x-bind:type="show ? 'text' : 'password'" model="form.password"
                          placeholder="{{__('auth.form.password.label')}}"
                          input-class="register__formContainer__inputContainer__input"
                          input-error-class="register__formContainer__inputContainer__input__error"/>
            <x-svg.svg class="register__formContainer__inputContainer__svg" name="eye" x-on:click="show = !show"/>
        </div>

        <button type="submit" class="register__formContainer__button">{{__('auth.form.button.register')}}</button>
        <p class="register__formContainer__alreadyAccount">{{__('front.register.already-account')}}
            <a href="{{route('auth.login')}}"
               class="register__formContainer__alreadyAccount--link">{{__('front.register.login')}}</a>
        </p>

    </x-form.form>
    <x-auth.imgContainer/>
</div>
