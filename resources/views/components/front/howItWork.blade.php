<section class="howItWorkContainer paddingMedia">
    <div class="howItWorkContainer__titleContainer">
        <h2 class="howItWorkContainer__titleContainer__title">{{__('front.commons.howItWork.title')}}</h2>
        <a href="{{route('auth.register')}}"
           class="button button--icon howItWorkContainer__titleContainer__button">{{__('front.commons.howItWork.button')}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="howItWorkContainer__titleContainer__button__svg" name="arrow"/>
        </a>
    </div>
    <div class="howItWorkContainer__stepContainer">
        <x-front.howItWorkCard title="{{__('front.commons.howItWork.stepOne.title')}}" svg-name="login"
                               subtitle="{{__('front.commons.howItWork.stepOne.subTitle')}}"
                               content="{!!__('front.commons.howItWork.stepOne.content')!!}"/>
        <x-front.howItWorkCard title="{{__('front.commons.howItWork.stepTwo.title')}}" svg-name="cart"
                               subtitle="{{__('front.commons.howItWork.stepTwo.subTitle')}}"
                               content="{!!__('front.commons.howItWork.stepTwo.content')!!}"/>
        <x-front.howItWorkCard title="{{__('front.commons.howItWork.stepThree.title')}}" svg-name="warehouse"
                               subtitle="{{__('front.commons.howItWork.stepThree.subTitle')}}"
                               content="{!!__('front.commons.howItWork.stepThree.content')!!}"/>
    </div>
</section>
