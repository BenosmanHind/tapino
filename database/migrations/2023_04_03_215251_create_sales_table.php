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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professional_id')->unsigned();
            $table->string('address')->nullable();
            $table->string('wilaya')->nullable();
            $table->float('total')->nullable();
            $table->float('promo')->nullable();
            $table->string('type_promo')->nullable();
            $table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
