<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('message_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('accounts');
            $table->foreignId('recipient_id')->constrained('accounts');
            $table->foreignId('message_status_id')->constrained();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('suggest_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipient_id')->constrained('accounts');
            $table->foreignId('message_status_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('merchantSuggest')->nullable();
            $table->string('productSuggest')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('suggest_messages');
        Schema::dropIfExists('message_statuses');
    }
};
