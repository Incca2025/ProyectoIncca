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
        Schema::create('interesado', function (Blueprint $table) {
            $table->id('IdInteresado');
            $table->string('Nombres_Int', 60);
            $table->string('Apellidos_Int', 60);
            $table->string('Email_Int', 100);
            $table->foreignId('IdProgAcademico')->constrained('progacademico', 'IdProgAcademico');
            $table->string('Celular_Int', 15);
            $table->foreignId('IdIntEstSeguimiento')->constrained('inter_estseguimiento', 'IdIntEstSeguimiento')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interesado');
    }
};
