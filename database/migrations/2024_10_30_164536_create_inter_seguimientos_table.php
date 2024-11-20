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
        Schema::create('inter_seguimientos', function (Blueprint $table) {
            $table->id('IdIntSeguimiento');
            $table->foreignId('IdInteresado')->constrained('interesado', 'IdInteresado');
            $table->foreignId('IdIntTipSeguimiento')->constrained('inter_tipseguimiento', 'IdIntTipSeguimiento');
            // $table->foreignId('IdIntEstSeguimiento')->constrained('inter_estseguimiento', 'IdIntEstSeguimiento');
            $table->string('ObsIntSeguimiento', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inter_seguimientos');
    }
};
