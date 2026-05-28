<x-auth.pageContainer wire="resetPassword">
    <div class="resetPassword" x-data="{ show: false}" x-on:success.window="show = true; setTimeout(() => show = false, 3000)">
        <h1 class="resetPassword__title">{{__('front.reset-password.title')}}</h1>
        <div x-data="{ show: false }">
            <x-form.input div-class="resetPassword__inputContainer" name="password"
                          label="{!!__('auth.form.password.label')!!}" required="true" eye-icon="true"
                          x-bind:type="show ? 'text' : 'password'" model="password"
                          placeholder="{{__('auth.form.password.placeholder')}}"
                          input-class="resetPassword__inputContainer__input"
                          input-error-class="resetPassword__inputContainer__input__error">
                <x-svg.svg title="{{__('svgTitle.eye')}}" class="resetPassword__inputContainer__svg"
                           name="eye"
                           x-show="!show"
                           x-on:click="show = !show"/>
                <x-svg.svg title="{{__('svgTitle.eye-slash')}}"
                           class="resetPassword__inputContainer__svg"
                           name="eye-slash"
                           x-show="show"
                           x-on:click="show = !show"/>
            </x-form.input>
        </div>

        <button type="submit"
                class="button button--icon resetPassword__button">
            {{__('auth.form.button.reset')}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="resetPassword__button__svg" name="arrow"/>
        </button>
        <p class="resetPassword__returnLogin">
            <a href="{{route('auth.login')}}" class="resetPassword__returnLogin__link">
                {{__('front.reset-password.return-login')}}
            </a>
        </p>
        <div
            x-show="show"
            x-transition
            class="toast"
            x-cloak
        >
            {{__('auth.success')}}
        </div>
    </div>
</x-auth.pageContainer>
