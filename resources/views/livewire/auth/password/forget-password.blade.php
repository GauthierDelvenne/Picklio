<x-auth.pageContainer wire="forgetPassword">
    <div class="forgetPassword" x-data="{ show: false }" x-on:success.window="show = true; setTimeout(() => show = false, 3000)">
        <h1 class="forgetPassword__title">{{__('front.forget-password.title')}}</h1>
        <p class="forgetPassword__subtitle">{{__('front.forget-password.subtitle')}}</p>
        <x-form.input div-class="forgetPassword__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}" required="true"
                      type="email" model="form.email" placeholder="johndoe@gmail.com"
                      input-class="forgetPassword__inputContainer__input"
                      input-error-class="forgetPassword__inputContainer__input__error"/>

        <x-form.button type="submit" class="forgetPassword__button" :title="__('auth.form.button.forget')"/>

        <p class="forgetPassword__returnLogin">
            <a href="{{route('auth.login')}}" class="forgetPassword__returnLogin__link">
                {{__('front.forget-password.return-login')}}
            </a>
        </p>
        <x-front.toast show="show" :title="__('auth.success')"/>
    </div>
</x-auth.pageContainer>

