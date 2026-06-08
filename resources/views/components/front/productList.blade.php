@props([
    'products',
 'title',
 'button',
 'type' => null])

<section class="productList paddingMedia" itemscope itemtype="https://schema.org/ItemList">
    <div class="productList__titleContainer">
        <h2 class="productList__titleContainer__title">{{$title}}</h2>
        <x-front.button-cta wire-click='goToCategories("{{ $type }}")'
                            class="productList__titleContainer__button"
                            :title="$button"/>
    </div>
    <div class="productList__productContainer">
        @foreach($products as $product)
            <div wire:click="goToProduct({{ $product->id }})" wire:key="product-{{ $product->id }}"     wire:keydown.enter="goToProduct({{ $product->id }})" tabindex="0"
                 role="link" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
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
            </div>
        @endforeach
    </div>
</section>
