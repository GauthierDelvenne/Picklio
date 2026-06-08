<x-auth.pageContainer wire="register">
    <div class="register">

        <h1 class="register__title">{{__('front.register.title')}}</h1>
        <div class="register__divContainer">
            <x-form.input div-class="register__divContainer__inputContainer" name="firstname"
                          label="{{__('auth.form.firstname.label')}}" required="true"
                          type="text" model="form.firstname" placeholder="John"
                          input-class="register__divContainer__inputContainer__input"
                          input-error-class="register__divContainer__inputContainer__input__error"/>

            <x-form.input div-class="register__divContainer__inputContainer" name="lastname"
                          label="{{__('auth.form.lastname.label')}}" required="true"
                          type="text" model="form.lastname" placeholder="Doe"
                          input-class="register__divContainer__inputContainer__input"
                          input-error-class="register__divContainer__inputContainer__input__error"/>
        </div>
        <div class="register__divContainer">
            <x-form.input div-class="register__divContainer__inputContainer" name="email"
                          label="{{__('auth.form.email.label')}}" required="true"
                          type="email" model="form.email" placeholder="johndoe@gmail.com"
                          input-class="register__divContainer__inputContainer__input"
                          input-error-class="register__divContainer__inputContainer__input__error"/>
            <div x-data="{ show: false }">
                <x-form.input div-class="register__divContainer__inputContainer" name="password"
                              label="{!!__('auth.form.password.label')!!}" required="true" eye-icon="true"
                              x-bind:type="show ? 'text' : 'password'" model="form.password"
                              placeholder="{{__('auth.form.password.placeholder')}}"
                              input-class="register__divContainer__inputContainer__input"
                              input-error-class="register__divContainer__inputContainer__input__error">
                    <x-svg.svg title="{{__('svgTitle.eye')}}" class="register__divContainer__inputContainer__svg"
                               name="eye"
                               x-show="!show"
                               x-on:click="show = !show"
                               x-on:keydown.enter="show = !show" tab="true"/>
                    <x-svg.svg title="{{__('svgTitle.eye-slash')}}" class="register__divContainer__inputContainer__svg"
                               name="eye-slash"
                               x-show="show"
                               x-on:click="show = !show"
                               x-on:keydown.enter="show = !show" tab="true"/>
                </x-form.input>
            </div>
        </div>

        <x-form.button type="submit" class="register__button" :title="__('auth.form.button.register')"/>

        <p class="register__alreadyAccount">{{__('front.register.already-account')}}
            <a href="{{route('auth.login')}}"
               class="register__alreadyAccount__link">{{__('front.register.login')}}</a>
        </p>
    </div>

</x-auth.pageContainer>
