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
        Schema::create('pen_asignatura', function (Blueprint $table) {
            $table->id('idPen_Asignatura');
            $table->unsignedInteger('numPeriodo')->default(1);
            $table->unsignedInteger('Electiva')->default(0);
            $table->unsignedInteger('numCreditos')->default(0);
            $table->foreignId('IdPensum')->constrained('pensum', 'IdPensum');
            $table->foreignId('IdAsignatura')->constrained('asignaturas', 'IdAsignatura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pen_asignatura');
    }
};
