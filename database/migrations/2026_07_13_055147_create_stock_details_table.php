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
        Schema::create('stock_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accounts_id')->constrained('accounts')->onDelete('cascade');
            // $table->foreignId('cities_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('products_id')->constrained('products')->onDelete('cascade');
            $table->string('stock_details')->nullable();
            $table->string('stock_in', 255);
            $table->string('stock_out', 255);
            $table->integer('sell_price');
            $table->string('doc_type', 20);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_details');
    }
};
