<section class="productList paddingMedia">
    <div class="productList__titleContainer">
        <h2 class="productList__titleContainer__title">{{$title}}</h2>
        <a href="{{route('front.catalogue.index')}}"
           class="button button--icon productList__titleContainer__button">{{$button}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="productList__titleContainer__button__svg" name="arrow"/>
        </a>
    </div>
    <div class="productList__productContainer">
        @foreach($products as $product)
            <a class="productList__productContainer__link" href="{{ route('front.catalogue.show', $product->id) }}">
                <x-front.productCard :img="$product"
                                     category="{!!  __('client.products.categories.'.$product->product_category_id)!!}"
                                     is-new="{{$product->created_at > now()->subDays(7) ? __('words.new') : ''}}"
                                     title="{{$product->name}}"
                                     sale-by="{{$product->account->user->name}}"
                                     price="{{$product->priceFormatted}}"
                                     :product="$product"
                                     wire-click="goToMerchant({{ $product->account->id }})"
                                     wire-click-category="goToCategory({{ $product->productCategory->id }})"
                />
            </a>
        @endforeach
    </div>
</section>
