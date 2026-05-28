<x-auth.pageContainer wire="forgetPassword">
    <div class="forgetPassword">
        <h1 class="forgetPassword__title">{{__('front.forget-password.title')}}</h1>
        <p class="forgetPassword__subtitle">{{__('front.forget-password.subtitle')}}</p>
        <x-form.input div-class="forgetPassword__inputContainer" name="email"
                      label="{{__('auth.form.email.label')}}" required="true"
                      type="email" model="form.email" placeholder="johndoe@gmail.com"
                      input-class="forgetPassword__inputContainer__input"
                      input-error-class="forgetPassword__inputContainer__input__error"/>


        <button type="submit"
                class="button button--icon forgetPassword__button">{{__('auth.form.button.forget')}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="forgetPassword__button__svg"
                       name="arrow"/>
        </button>
        <p class="forgetPassword__returnLogin">
            <a href="{{route('auth.login')}}" class="forgetPassword__returnLogin__link">
                {{__('front.forget-password.return-login')}}
            </a>
        </p>
    </div>

</x-auth.pageContainer>

