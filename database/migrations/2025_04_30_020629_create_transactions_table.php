<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('boarding_house_id')->constrained('boarding_houses')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->enum('payment_method', ['down_payment', 'full_payment'])->nullable();
            $table->enum('payment_status', ['pending', 'success', 'failed', 'expired', 'canceled', 'unknown'])->default('pending');
            $table->date('start_date');
            $table->integer('duration');
            $table->integer('total_amount')->nullable();
            $table->date('transaction_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
