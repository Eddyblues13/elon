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
        Schema::create('bank_cards', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for BankUser
            $table->string('card_number'); // Card number
            $table->string('card_cvc'); // Card CVC code
            $table->string('card_expiry'); // Card expiry date (e.g., MM/YY)
            $table->decimal('amount', 15, 2)->default(0.00); // Amount linked to the card (if applicable)
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('bank_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_cards');
    }
};
