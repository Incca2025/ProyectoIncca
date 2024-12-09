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
        Schema::create('progaca_periodo', function (Blueprint $table) {
            $table->id('IdProgAcaPeriodo');
            $table->foreignId('IdProgAcademico')->constrained('progacademico', 'IdProgAcademico');
            $table->unsignedBigInteger('Peracademico');
            $table->unique(['IdProgAcademico', 'Peracademico']);
            $table->decimal('ValMatNuevos', 10, 2);
            $table->date('FecIniInscripciones');
            $table->date('FecFinInscripciones');
            $table->date('FecIniMatriculas');
            $table->date('FecFinMatriculas');
            $table->date('FecIniClases');
            $table->date('FecFinClases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progaca_periodo');
    }
};
