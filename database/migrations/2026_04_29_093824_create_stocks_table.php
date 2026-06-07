<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity')->default(0);
            $table->integer('quantity_reserved')->default(0);
            $table->foreignId('stock_status_id');
            $table->timestamps();
        });
        Schema::create('stock_movement_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
        });
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->foreignId('stock_movement_type_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('stock_movements');
        Schema::dropIfExists('stock_movement_types');
        Schema::dropIfExists('stock_statuses');
    }
};
