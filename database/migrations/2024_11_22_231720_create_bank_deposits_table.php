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
        Schema::create('bank_deposits', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for BankUser
            $table->decimal('amount', 15, 2); // Deposit amount
            $table->string('front_cheque')->nullable(); // Path to the front cheque image
            $table->string('back_cheque')->nullable(); // Path to the back cheque image
            $table->enum('deposit_type', ['Cash', 'Cheque', 'Transfer'])->default('Cash'); // Deposit type
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending'); // Deposit status
            $table->timestamps(); // Created at and Updated at timestamps

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('bank_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_deposits');
    }
};
