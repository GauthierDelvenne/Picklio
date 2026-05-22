<div class="productCard">
    <div class="productCard__imgContainer">
        @if($img->picture_path == 'images/missing-product.webp')
            <img src="{{asset($img->picture_path)}}" alt="" class="productCard__imgContainer__img">
        @else
            <img
                src="{{ $img->pictureUrl(600) }}"
                srcset="{{ $img->pictureUrl(300) }} 300w, {{ $img->pictureUrl(600) }} 600w,{{ $img->pictureUrl(900) }} 900w"
                sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                alt="{{$img->name}}" class="productCard__imgContainer__img">
        @endif
        <div class="productCard__imgContainer__tagContainer">
            @if(!empty($category))
                <div class="productCard__imgContainer__tagContainer__tagItem">
                    <p class="productCard__imgContainer__tagContainer__tagItem__tag">{{$category}}</p>
                </div>
            @endif
            @if(!empty($isNew))
                <div class="productCard__imgContainer__tagContainer__tagItem">
                    <p class="productCard__imgContainer__tagContainer__tagItem__tag">{{$isNew}}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="productCard__contentContainer">
        <div class="productCard__contentContainer__informationContainer">
            <p class="productCard__contentContainer__informationContainer__title">{{$title}}</p>
            <p class="productCard__contentContainer__informationContainer__saleBy"><span
                    class="productCard__contentContainer__informationContainer__saleBy__span">{{__('front.commons.sale-by')}}</span> {{$saleBy}}
            </p>
        </div>
        <livewire:front.components.shop-card
            :price="$price"
            :product="$product"
            :card="true"
        />
    </div>
</div>
