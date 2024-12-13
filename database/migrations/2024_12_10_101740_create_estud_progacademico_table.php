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
        Schema::create('estud_progacademico', function (Blueprint $table) {
            $table->id('IdEstudProAca');
            $table->foreignId('IdPersona')->constrained('personas', 'IdPersona');
            $table->foreignId('IdProgAcademico')->constrained('progacademico', 'IdProgAcademico');
            $table->unique(['IdPersona', 'IdProgAcademico']);
            $table->foreignId('IdPensum')->constrained('progacademico', 'IdProgAcademico');
            $table->foreignId('IdProgAca_Periodo')->constrained('progaca_periodo', 'IdProgAcaPeriodo');
            $table->date('FecIngreso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estud_progacademico');
    }
};
