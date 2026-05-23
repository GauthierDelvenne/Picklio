<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pickup_slots', function (Blueprint $table) {
            $table->id();
            $table->integer('day_iso');
            $table->time('time');
            $table->string('max_orders')->default('2');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('code', 6)->unique();
            $table->foreignId('account_id')->constrained();
            $table->foreignId('pickup_slot_id')->constrained();
            $table->date('pickup_date');
            $table->string('status');
            $table->string('total_price');
            $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->foreignId('merchant_id')->constrained('accounts');
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('pickup_slots');
    }
};
