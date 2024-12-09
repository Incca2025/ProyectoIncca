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
        Schema::create('progacademico', function (Blueprint $table) {
            $table->id('IdProgAcademico');
            $table->string('NomProgAcademico');
            $table->foreignId('IdNivPrograma')->constrained('nivprograma', 'IdNivPrograma');
            $table->unsignedInteger('ResMen');
            $table->string('FecResMen', 45);
            $table->unsignedInteger('Snies');
            $table->string('CodProgAcademico', 15);
            $table->foreignId('IdTipPeriodo')->constrained('tipperiodo', 'IdTipPeriodo');
            $table->unsignedInteger('NumPeriodos');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progacademico');
    }
};
