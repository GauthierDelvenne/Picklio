<div class="slot">
    <section class="slot__container paddingMedia">
        <div class="slot__container__titleContainer">
            <h2 class="slot__container__titleContainer__title">{{__('commons.pageName.front.slot')}}</h2>
            <x-front.warningCart/>
        </div>

        <div class="slot__container__pickupContainer">

            <div class="slot__container__pickupContainer__weekContainer">

                <x-form.select
                    div-class="slot__container__pickupContainer__weekContainer__inputContainer"
                    name="selectedWeek"
                    model-live="selectedWeek"
                    label="{{__('front.slot.weekContainer.title')}}"
                    input-class="slot__container__pickupContainer__weekContainer__inputContainer__input"
                    input-error-class="slot__container__pickupContainer__weekContainer__inputContainer__input__error">
                    @foreach($this->weeks as $key => $week)
                        <option value="{{ $key }}">{{ $week['label'] }}</option>
                    @endforeach
                </x-form.select>
                <button wire:click="switchWeek"
                        class="button button--left slot__container__pickupContainer__weekContainer__button slot__container__pickupContainer__weekContainer__button--left">
                    <x-svg.svg title="{{__('svgTitle.arrow')}}"
                               class="slot__container__pickupContainer__weekContainer__button__svg slot__container__pickupContainer__weekContainer__button__svg--left"
                               name="arrow"/>
                    <span class="sr-only">{{__('Previous')}}</span>
                </button>
                <button wire:click="switchWeek" class="button slot__container__pickupContainer__weekContainer__button">
                    <x-svg.svg title="{{__('svgTitle.arrow')}}"
                               class="slot__container__pickupContainer__weekContainer__button__svg" name="arrow"/>
                    <span class="sr-only">{{__('Next')}}</span>
                </button>
            </div>
            <div class="slot__container__pickupContainer__dayContainer">
                <p class="slot__container__pickupContainer__dayContainer__title">{{__('front.slot.dayContainer.title')}}</p>
                <div class="slot__container__pickupContainer__dayContainer__dayCardContainer">
                    @foreach($this->weeks[$selectedWeek]['days'] as $day)
                        <button
                            @disabled($this->isDayPast($day)) wire:click="$set('form.pickup_date', '{{ $day->toDateString() }}')"
                            class="slot__container__pickupContainer__dayContainer__dayCardContainer__card {{$this->isDayPast($day) ? 'disabled' : ''}} {{ $this->form->pickup_date === $day->toDateString() ? 'active' : '' }}">
                            <span class="slot__container__pickupContainer__dayContainer__dayCardContainer__card__day">{{ \Carbon\Carbon::parse($day)->translatedFormat('l') }}</span>
                            <span class="slot__container__pickupContainer__dayContainer__dayCardContainer__card__date">{{ \Carbon\Carbon::parse($day)->format('d') }}</span>
                            <span class="slot__container__pickupContainer__dayContainer__dayCardContainer__card__month">{{ \Carbon\Carbon::parse($day)->translatedFormat('F') }}</span>
                        </button>
                    @endforeach
                </div>
                @error('form.pickup_date')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="slot__container__pickupContainer__slotContainer">
                <p class="slot__container__pickupContainer__slotContainer__title">{{__('front.slot.slotContainer.title')}}</p>
                <div class="slot__container__pickupContainer__slotContainer__slotCardContainer">
                    @forelse($this->slots() as $slot)
                        <button
                            @disabled($this->isSlotPast($slot) || $this->isSlotFull($slot)) wire:click="$set('form.pickup_slot_id', {{ $slot->id }})"
                            class="slot__container__pickupContainer__slotContainer__slotCardContainer__card {{ $this->isSlotPast($slot) || $this->isSlotFull($slot) ? 'disabled' : '' }} {{ $this->form->pickup_slot_id === $slot->id ? 'active' : '' }}">
                            <span class="slot__container__pickupContainer__slotContainer__slotCardContainer__card__time">{{  $slot->time->format('H:i')  }}</span>
                        </button>
                    @empty
                        <p class="slot__container__pickupContainer__slotContainer__slotCardContainer__empty"> {{__('front.slot.empty-slot')}}</p>
                    @endforelse
                </div>
                @error('form.pickup_slot_id')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button wire:click="createOrder" class="button button--icon slot__container__button">
            {{__('front.slot.button')}}
            <x-svg.svg title="{{__('svgTitle.arrow')}}" class="slot__container__button__svg" name="arrow"/>
        </button>
    </section>
</div>
