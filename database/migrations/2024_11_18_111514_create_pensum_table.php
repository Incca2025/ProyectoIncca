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
        Schema::create('pensum', function (Blueprint $table) {
            $table->id('IdPensum');
            $table->foreignId('IdProgAcademico')->constrained('progacademico', 'IdProgAcademico');
            $table->foreignId('perAcademico_Inicial')->constrained('progaca_periodo', 'IdProgAcaPeriodo');
            $table->foreignId('perAcademico_Final')->nullable()->constrained('progaca_periodo', 'IdProgAcaPeriodo');
            $table->string('desPensum', 40);
            $table->unsignedInteger('numCredAprob');
            $table->decimal('promMinimo', 4, 2);
            $table->unsignedInteger('numPeriodos');
            $table->string('CodPensum', 15);
            $table->unique(['IdProgAcademico', 'CodPensum']);
            $table->foreignId('IdTipPeriodos')->constrained('tip_periodopensum', 'IdTipPeriodos');
	    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pensum');
    }
};
