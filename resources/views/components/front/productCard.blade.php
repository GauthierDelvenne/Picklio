<div class="productCard" itemscope itemtype="https://schema.org/Product">
    <div class="productCard__imgContainer">
        @if($img->picture_path == 'images/missing-product.webp')
            <img src="{{asset($img->picture_path)}}" alt="{{$img->name}}" class="productCard__imgContainer__img" itemprop="image">
        @else
            <img
                src="{{ $img->pictureUrl(600) }}"
                srcset="{{ $img->pictureUrl(300) }} 300w, {{ $img->pictureUrl(600) }} 600w,{{ $img->pictureUrl(900) }} 900w"
                sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                alt="{{$img->name}}" class="productCard__imgContainer__img" itemprop="image">
        @endif
        <div class="productCard__imgContainer__tagContainer">
            @if(!empty($category))
                <div class="productCard__imgContainer__tagContainer__tagItem no-card-hover" tabindex="0"
                     role="link" wire:keydown.enter.stop="{{$wireClickCategory}}" wire:click.stop="{{$wireClickCategory}}">
                    <p class="productCard__imgContainer__tagContainer__tagItem__tag" itemprop="category">{{$category}}</p>
                </div>
            @endif
            @if(!empty($isNew))
                <div class="productCard__imgContainer__tagContainer__tagItem productCard__imgContainer__tagContainer__tagItem--new">
                    <p class="productCard__imgContainer__tagContainer__tagItem__tag">{{$isNew}}</p>
                </div>
            @endif
        </div>
    </div>
    <div class="productCard__contentContainer">
        <div class="productCard__contentContainer__informationContainer">
            <p class="productCard__contentContainer__informationContainer__title" itemprop="name">{{$title}}</p>
            <p class="productCard__contentContainer__informationContainer__saleBy no-card-hover" tabindex="0"
               role="link" wire:keydown.enter.stop="{{$wireClick}}" wire:click.stop="{{$wireClick}}" itemprop="brand" itemscope itemtype="https://schema.org/Organization"><span
                    class="productCard__contentContainer__informationContainer__saleBy__span">{{__('front.commons.sale-by')}}</span> <span itemprop="name">{{$saleBy}}</span>
            </p>
        </div>
        <livewire:front.components.shop-card
            :price="$price"
            :product="$product"
            :card="true"
            :cart-item="$cartItem ?? null"

        />
    </div>
</div>
