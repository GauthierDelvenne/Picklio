<div class="resetPassword">
    <x-form.form wire-submit="resetPassword" class="resetPassword__formContainer">
        <h1 class="resetPassword__formContainer__title">{{__('front.reset-password.title')}}</h1>
        <div x-data="{ show: false }">

        <x-form.input div-class="resetPassword__formContainer__inputContainer" name="password"
                      label="{{__('auth.form.password.label')}}"
                      x-bind:type="show ? 'text' : 'password'" model="password" placeholder="{{__('auth.form.password.label')}}"
                      input-class="resetPassword__formContainer__inputContainer__input"
                      input-error-class="resetPassword__formContainer__inputContainer__input__error"/>
            <x-svg.svg class="register__formContainer__inputContainer__svg" name="eye" x-on:click="show = !show"/>
        </div>

        <button type="submit" class="resetPassword__formContainer__button">{{__('auth.form.button.reset')}}</button>
        <p class="resetPassword__formContainer__returnLogin">
            <a href="{{route('auth.login')}}" class="resetPassword__formContainer__returnLogin--link">
                {{__('front.reset-password.return-login')}}
            </a>
        </p>

    </x-form.form>
    <x-auth.imgContainer/>
</div>
