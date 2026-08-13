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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name_e', 255);
            $table->string('name_u', 255);

            // $table->unsignedBigInteger('cities_id');
            $table->foreignId('cities_id')->constrained('cities')->onDelete('cascade');

            // $table->unsignedBigInteger('headers_id');
            $table->foreignId('headers_id')->constrained('headers')->onDelete('cascade');

            // $table->unsignedBigInteger('sub_headers_id');
            $table->foreignId('sub_headers_id')->constrained('sub_headers')->onDelete('cascade');

            $table->string('phone', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
