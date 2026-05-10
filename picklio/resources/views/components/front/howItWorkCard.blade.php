<article class="howItWork__card">
    <h3 class="howItWork__card__title">{{$title}}</h3>
    <x-svg.svg class="howItWork__card__svg" name="{{$svgName}}"/>
    <p class="howItWork__card__subTitle">
        <x-svg.svg class="howItWork__card__subTitle__svg"
                   name="underline"/>
        <span class="howItWork__card__subTitle__span">{{$subtitle}}</span>
    </p>
    <p class="howItWork__card__content">{!! $content !!}</p>
</article>
