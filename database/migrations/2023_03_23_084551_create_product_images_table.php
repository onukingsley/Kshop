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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->string('prod_1')->nullable();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('prod_2')->nullable();
            $table->string('prod_3')->nullable();
            $table->string('prod_4')->nullable();
            $table->string('prod_5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
