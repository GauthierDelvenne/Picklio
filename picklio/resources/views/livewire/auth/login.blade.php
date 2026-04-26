<div class="login">
    <x-form.form wire-submit="login" class="login__formContainer">
        <h1 class="login__formContainer__title">{{__('front.login.title')}}</h1>
        <x-form.input div-class="login__formContainer__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}"
                      type="email" model="form.email" placeholder="{{__('auth.form.email.label')}}"
                      input-class="login__formContainer__inputContainer__input"
                      input-error-class="login__formContainer__inputContainer__input__error"/>

        <x-form.input div-class="login__formContainer__inputContainer" name="password"
                      label="{{__('auth.form.password.label')}}"
                      type="password" model="form.password" placeholder="{{__('auth.form.password.label')}}"
                      input-class="login__formContainer__inputContainer__input"
                      input-error-class="login__formContainer__inputContainer__input__error"/>

        <x-form.checkbox div-class="login__formContainer__checkboxContainer" name="remember"
                         label="{{__('auth.form.remember.label')}}"
                         model="form.remember"
                         input-class="login__formContainer__checkboxCContainer__checkboxC"
                         input-error-class="login__formContainer__checkboxCContainer__checkboxC__error"/>
        <p class="login__formContainer__forgetPassword"><a href="{{route('auth.password.forget-password')}}">{{__('front.login.forget-password')}}</a></p>

        <button type="submit" class="login__formContainer__button">{{__('auth.form.button.login')}}</button>
        <p class="login__formContainer__noAccount">{{__('front.login.no-account')}}
            <a href="{{route('auth.register')}}" class="login__formContainer__noAccount--link">{{__('front.login.register')}}</a>
        </p>

    </x-form.form>
    <x-auth.imgContainer/>
</div>
