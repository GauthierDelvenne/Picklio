@props([
    'count' => [],
    'name',
    'search' => null,
    'items' => [],
])
<div class="filter"
     x-data="{ open: false }">
    <button
        @click="open = !open"
        class="button button--filter filter__button">
        @if(count($count) > 0)
            {{ count($count)  }} {{ __('front.catalogue.productSection.'.$name.'Filter') }}
        @else
            {{ __('front.catalogue.productSection.'.$name.'Filter') }}
        @endif
    </button>

    <div x-show="open" x-cloak @click.outside="open = false"
         class="filter__itemContainer">
        @if($search)
            <div
                class="filter__itemContainer__searchContainer">
                <input wire:model.live.debounce.500ms="{{$search}}" type="search" name="{{$search}}"
                       id="{{$search}}"
                       aria-label="{{__('front.catalogue.productSection.searchFilter')}}"
                       placeholder="{{__('front.catalogue.productSection.searchFilter')}}"
                       class="filter__itemContainer__searchContainer__search">
            </div>
        @endif
            @if(count($count) > 0)
                <button
                    wire:click="resetArray('{{$name}}')"
                    type="button"
                    class="button button--reset filter__itemContainer__resetButton">
                    {{ __('front.catalogue.productSection.resetFilter') }}
                </button>
            @else
                <button
                    wire:click="selectArray('{{$name}}')"
                    type="button"
                    class="button button--reset filter__itemContainer__resetButton">
                    {{ __('front.catalogue.productSection.selectFilter') }}
                </button>
            @endif
        @foreach($items as $item)
                <div
                class="filter__itemContainer__item">
                <input type="checkbox" id="{{$name}}-{{ $item->id }}" name="{{$name}}-{{ $item->id }}"
                       wire:model.live="{{$name}}"
                       value="{{ $item->id }}"
                       class="filter__itemContainer__item__input">
                <label for="{{$name}}-{{ $item->id }}"
                       class="filter__itemContainer__item__label">
                    @if($name == 'merchant')
                        {{$item->user->name}}
                    @else
                        {{ __('client.products.categories.' . $item->id) }}
                    @endif
                </label>
            </div>

        @endforeach
    </div>
</div>
