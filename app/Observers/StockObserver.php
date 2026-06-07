<?php

namespace App\Observers;

use App\Models\Stock;
use App\Models\StockStatus;

class StockObserver
{
    public function updated(Stock $stock): void
    {
        $capacity = $stock->product->productCategory->capacity;

        $status = match (true) {
            $stock->isVeryLowStock($capacity) => StockStatus::VERYLOW,
            $stock->isLowStock($capacity) => StockStatus::LOW,
            default => StockStatus::GOOD,
        };

        $stock->updateQuietly(['stock_status_id' => $status]);
    }
}
