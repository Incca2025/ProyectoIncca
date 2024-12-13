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
        Schema::create('pen_asignatura_requisitos', function (Blueprint $table) {
            $table->id('IdPenRequisito');
            $table->foreignId('IdPen_Asignatura')->constrained('pen_asignatura', 'IdPen_Asignatura');
            $table->foreignId('IdAsignatura')->constrained('asignaturas', 'IdAsignatura');
            $table->unique(['IdPen_Asignatura', 'IdAsignatura']);
            $table->unsignedInteger('Prerequisito')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pen_asignatura_requisitos');
    }
};
