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
        Schema::create('techers', function (Blueprint $table) {
            $table->id();
            $table->string('techer_name');
            $table->string('techer_image');
            $table->string('techer_title');
            $table->string('techer_discription');
            $table->string('telegram');
            $table->string('instagram');
            $table->string('facebook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('techers');
    }
};
