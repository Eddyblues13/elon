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
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for BankUser
            $table->string('transaction_id')->unique(); // Unique transaction ID
            $table->string('transaction_ref')->nullable(); // Optional reference ID
            $table->enum('transaction_type', ['Credit', 'Debit']); // Credit or Debit
            $table->string('transaction'); // Deposit, Withdrawal, Transfer, etc.
            $table->string('wallet_address')->nullable(); // Optional wallet address
            $table->string('wallet_type')->nullable(); // Type of wallet (e.g., Bitcoin, Ethereum)
            $table->decimal('transaction_amount', 15, 2); // Transaction amount
            $table->text('transaction_description')->nullable(); // Description
            $table->enum('transaction_status', ['Pending', 'Completed', 'Failed'])->default('Pending'); // Status
            $table->string('account_name')->nullable(); // Optional account name
            $table->string('account_number')->nullable(); // Optional account number
            $table->string('account_type')->nullable(); // Savings, Current, etc.
            $table->string('bank_name')->nullable(); // Optional bank name
            $table->string('routing_number')->nullable(); // Optional routing number
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
        Schema::dropIfExists('bank_transactions');
    }
};
