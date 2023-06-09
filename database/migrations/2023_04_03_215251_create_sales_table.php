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
            $table->integer('saletable_id');
            $table->string('saletable_type');
            $table->string('address')->nullable();
            $table->string('wilaya')->nullable();
            $table->string('code')->nullable();
            $table->float('total');
            $table->float('promo')->nullable();
            $table->float('total_f')->nullable();
            $table->tinyInteger('type_promo')->nullable();
            $table->float('tva')->nullable();
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
