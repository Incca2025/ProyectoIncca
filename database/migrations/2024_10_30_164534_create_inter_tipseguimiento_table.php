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
        Schema::create('inter_tipseguimiento', function (Blueprint $table) {
            $table->id('IdIntTipSeguimiento');
            $table->string('DesTipSeguimiento');
            $table->string('InstTipSeguimiento', 4000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inter_tipseguimiento');
    }
};
