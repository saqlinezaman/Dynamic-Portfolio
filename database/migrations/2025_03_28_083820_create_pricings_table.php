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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Plan Name
            $table->decimal('price', 8, 2)->nullable(); // Price
            $table->string('status')->default('active');
            $table->json('features'); // Features (JSON Format)
            $table->boolean('is_popular')->default(false); // Popular Ba
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
