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
            $table->string('NomProgAcademico', 150);
            $table->foreignId('IdNivPrograma')->constrained('nivprograma', 'IdNivPrograma');
            $table->string('ResMen', 15);
            $table->date('FecResMen');
            $table->string('Snies', 15);
            $table->string('CodProgAcademico', 15)->unique();
            $table->foreignId('IdTipPeriodos')->constrained('tip_periodopensum', 'IdTipPeriodos');
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
