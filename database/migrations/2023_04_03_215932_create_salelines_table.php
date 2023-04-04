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
        Schema::create('salelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id')->unsigned();
            $table->unsignedBigInteger('productline_id')->unsigned();
            $table->integer('qte');
            $table->float('price')->nullable();
            $table->float('total');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('productline_id')->references('id')->on('productlines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salelines');
    }
};
