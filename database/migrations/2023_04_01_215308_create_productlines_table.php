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
        Schema::create('productlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('width');
            $table->integer('height');
            $table->integer('totalm_1');
            $table->integer('totalm_2')->nullable();
            $table->integer('totalm_3')->nullable();
            $table->integer('m2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productlines');
    }
};
