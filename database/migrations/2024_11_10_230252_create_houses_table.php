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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('state');
            $table->foreignId('category_id')->constrained('house_categories')->onDelete('cascade');
            $table->string('address');
            $table->text('description')->nullable();
            $table->integer('square')->nullable();
            $table->integer('bath')->nullable();
            $table->integer('bed')->nullable();
            $table->decimal('original_price', 15, 2)->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();
            $table->unsignedTinyInteger('rating')->default(0);
            $table->boolean('trending')->default(false);
            $table->enum('status', ['available', 'sold', 'pending'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
