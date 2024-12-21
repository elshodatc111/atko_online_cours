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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('cours_name');
            $table->string('cours_image');
            $table->string('cours_description');
            $table->string('lessin_time');
            $table->string('techer_name');
            $table->string('lessin_daraja');
            $table->string('lessin_price');
            $table->string('lessin_davomiyligi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
