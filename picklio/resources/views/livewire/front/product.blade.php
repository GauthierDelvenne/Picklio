<div class="product">
    <section class="product__informationContainer paddingMedia">
        <div class="product__informationContainer__imgContainer">
            <ul class="product__informationContainer__imgContainer__breadCrumb">
                <li class="product__informationContainer__imgContainer__breadCrumb__item"><a
                        href="{{ route('front.catalogue.index') }}"
                        class="product__informationContainer__imgContainer__breadCrumb__item__link">{{__('commons.pageName.front.catalogue')}}</a>
                </li>
                <li class="product__informationContainer__imgContainer__breadCrumb__item">
                    <x-svg.svg class="product__informationContainer__imgContainer__breadCrumb__item__svg" name="arrow"/>
                </li>
                <li class="product__informationContainer__imgContainer__breadCrumb__item">{{$this->product->name}}</li>
            </ul>
            @if($product->picture_path == 'images/missing-product.webp')
                <img src="{{asset($product->picture_path)}}" alt=""
                     class="product__informationContainer__imgContainer__img">
            @else
                <img src="{{ $product->pictureUrl(600) }}"
                     srcset="{{ $product->pictureUrl(300) }} 300w, {{ $product->pictureUrl(600) }} 600w,{{ $product->pictureUrl(900) }} 900w"
                     sizes="(max-width: 400px) 300px, (max-width: 700px) 600px, 900px"
                     alt="{{$product->name}}" class="product__informationContainer__imgContainer__img">
            @endif
        </div>
        <div class="product__informationContainer__contentContainer">
            <div class="product__informationContainer__contentContainer__titleContainer">
                <h2 class="product__informationContainer__contentContainer__titleContainer__title">{{$product->name}}</h2>
                <p class="product__informationContainer__contentContainer__titleContainer__saleBy">
                    <span
                        class="product__informationContainer__contentContainer__titleContainer__saleBy__span">{{__('front.commons.sale-by')}}</span> {{$product->account->user->name}}
                </p>
            </div>
            <div class="product__informationContainer__contentContainer__descriptionContainer">
                <p class="product__informationContainer__contentContainer__descriptionContainer__category">{!!  __('client.products.categories.'.$product->product_category_id)!!}</p>
                <p class="product__informationContainer__contentContainer__descriptionContainer__description">{{$product->description}}</p>
            </div>
            <hr class="product__informationContainer__contentContainer__hr">
            <livewire:front.components.shop-card
                :price="$product->priceFormatted"
                :productId="$product->id"
                :card="false"
            />
        </div>
    </section>
    <x-front.productList :products="$this->products"
                         title="{{__('front.product.discover.title')}}"
                         button="{{__('front.product.discover.button')}}"/>
</div>
