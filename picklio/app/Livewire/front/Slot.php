<?php

namespace App\Livewire\front;

use App\Livewire\form\front\ChooseSlotForm;
use App\Livewire\PicklioComponent;
use App\Models\Order;
use App\Models\PickupSlot;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Attributes\Computed;

class Slot extends PicklioComponent
{
    public $today;

    public Order $order;

    public $days;

    public $selectedWeek = 'current';

    public ChooseSlotForm $form;

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->today = Carbon::now();
        if ($this->order->status != Order::INITCART) {
            $this->redirectRoute('front.basket');
        }
    }

    #[Computed]
    public function weeks(): array
    {
        $start = Carbon::now()->startOfWeek(Carbon::TUESDAY);
        $end = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        $nextStart = Carbon::now()->addWeek()->startOfWeek(Carbon::TUESDAY);
        $nextEnd = Carbon::now()->addWeek()->endOfWeek(Carbon::SATURDAY);

        return [
            'current' => [
                'label' => __('front.slot.little_word.from') . ' ' . $start->format('d/m') . ' ' . __('front.slot.little_word.to') . ' ' . $end->format('d/m'),
                'days' => CarbonPeriod::create($start, $end),
            ],
            'next' => [
                'label' => __('front.slot.little_word.from') . ' ' . $nextStart->format('d/m') . ' ' . __('front.slot.little_word.to') . ' ' . $nextEnd->format('d/m'),
                'days' => CarbonPeriod::create($nextStart, $nextEnd),
            ],
        ];
    }

    #[Computed]
    public function slots()
    {
        if (!$this->form->pickup_date) {
            return [];
        }

        $dayOfWeek = Carbon::parse($this->form->pickup_date)->dayOfWeekIso;

        $slots = PickupSlot::where('day_iso', $dayOfWeek)
            ->withCount(['orders' => function ($query) {
                $query->where('pickup_date', $this->form->pickup_date);
            }])
            ->get();

        return $slots;
    }

    public function createOrder()
    {
        if ($this->form->createOrder()) {
            $this->redirectRoute('front.order-confirmation');
        }
    }

    public function isDayPast($day)
    {
        return $day->startOfDay() < $this->today->startOfDay();
    }

    public function isSlotPast($slot)
    {
        return !empty($this->form->pickup_date)
            && $this->form->pickup_date === now()->format('Y-m-d')
            && $slot->time->format('H:i') <= now()->format('H:i');
    }

    public function isSlotFull($slot): bool
    {
        return $slot->orders_count >= $slot->max_orders;
    }

    public function switchWeek()
    {
        if ($this->selectedWeek == 'current') {
            $this->selectedWeek = 'next';
        } else {
            $this->selectedWeek = 'current';
        }

    }

    public function render()
    {
        return view('livewire.front.slot')
            ->layout('layouts.front')
            ->title(__('commons.pageName.front.slot') . ' | Picklio');
    }
}
