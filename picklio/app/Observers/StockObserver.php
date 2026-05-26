<?php

namespace App\Observers;

use App\Models\Stock;

class StockObserver
{
    public function updated(Stock $stock): void
    {
        $capacity = $stock->product->productCategory->capacity;

        $status = match (true) {
            $stock->isVeryLowStock($capacity) => Stock::VERYLOW,
            $stock->isLowStock($capacity) => Stock::LOW,
            default => Stock::GOOD,
        };

        $stock->updateQuietly(['status' => $status]);
    }
}
