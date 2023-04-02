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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->string('designation');
            $table->integer('pricem_1');
            $table->integer('pricem_2')->nullable();
            $table->integer('pricem_3')->nullable();
            $table->integer('qte_alert')->nullable();
            $table->string('emplacement');
            $table->string('designation_2')->nullable();
            $table->string('slug')->nullable();
            $table->integer('flag')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
