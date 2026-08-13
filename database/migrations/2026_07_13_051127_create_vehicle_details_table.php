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
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number', 255);
            $table->string('builty_number', 255);
            $table->uuid('uuid')->unique();
            // $table->unsignedBigInteger('accounts_id');
            $table->foreignId('accounts_id')->constrained('accounts')->onDelete('cascade');
            // $table->unsignedBigInteger('cities_id');
            $table->foreignId('cities_id')->constrained('cities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_details');
    }
};
