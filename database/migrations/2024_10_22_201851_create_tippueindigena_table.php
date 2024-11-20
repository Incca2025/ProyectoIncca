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
        Schema::create('tippueindigena', function (Blueprint $table) {
            $table->id('IdTipPueIndigena');
            $table->string('CodMenPIndigena', 5)->unique();
            $table->string('DesPueIndigena', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tippueindigena');
    }
};
