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
                           x-on:click="show = !show"
                           x-on:keydown.enter="show = !show" tab="true"/>
                <x-svg.svg title="{{__('svgTitle.eye-slash')}}"
                           class="resetPassword__inputContainer__svg"
                           name="eye-slash"
                           x-show="show"
                           x-on:click="show = !show"
                           x-on:keydown.enter="show = !show" tab="true"/>
            </x-form.input>
        </div>

        <x-form.button type="submit" class="resetPassword__button" :title="__('auth.form.button.reset')"/>

        <p class="resetPassword__returnLogin">
            <a href="{{route('auth.login')}}" class="resetPassword__returnLogin__link">
                {{__('front.reset-password.return-login')}}
            </a>
        </p>
        <x-front.toast show="show" :title="__('auth.success')"/>
    </div>
</x-auth.pageContainer>
