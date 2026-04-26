<div class="forgetPassword">
    <x-form.form wire-submit="forgetPassword" class="forgetPassword__formContainer">
        <h1 class="forgetPassword__formContainer__title">{{__('front.forget-password.title')}}</h1>
        <p class="forgetPassword__formContainer__subtitle">{{__('front.forget-password.subtitle')}}</p>
        <x-form.input div-class="forgetPassword__formContainer__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}"
                      type="email" model="form.email" placeholder="{{__('auth.form.email.label')}}"
                      input-class="forgetPassword__formContainer__inputContainer__input"
                      input-error-class="forgetPassword__formContainer__inputContainer__input__error"/>


        <button type="submit" class="forgetPassword__formContainer__button">{{__('auth.form.button.forget')}}</button>
        <p class="forgetPassword__formContainer__returnLogin">
            <a href="{{route('auth.login')}}" class="forgetPassword__formContainer__returnLogin--link">
                {{__('front.forget-password.return-login')}}
            </a>
        </p>

    </x-form.form>
    <x-auth.imgContainer/>
</div>
