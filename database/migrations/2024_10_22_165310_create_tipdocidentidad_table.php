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
        Schema::create('tipdocidentidad', function (Blueprint $table) {
            $table->id('IdTipDocIdentidad');
            $table->string('AbreDocIdentidad', 5)->unique();
            $table->string('DesDocidentidad', 45);
            $table->unsignedInteger('DocDian')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipdocidentidad');
    }
};
