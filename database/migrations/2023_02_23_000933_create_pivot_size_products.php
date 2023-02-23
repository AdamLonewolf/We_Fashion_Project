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
        Schema::create('pivot_size_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('size_id')->nullable()->constrained('sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_size');
    }
};
