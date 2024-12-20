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
        Schema::create('costos', function (Blueprint $table) {
            $table->id('IdCostos');
            $table->string('DesCostos', 45);
            $table->foreignId('IdProgAcademico')->constrained('progacademico', 'IdProgAcademico');
            $table->foreignId('IdProgAcaPeriodo')->constrained('progaca_periodo', 'IdProgAcaPeriodo');
            $table->decimal('Valor', 10, 2);
            $table->string('CodContable', 15);
            $table->string('NumMaxCuotas', 15);
            $table->unsignedInteger('CargoFijo')->default(1);
            $table->unsignedInteger('CredMinimo');
            $table->unsignedInteger('CredMaximo');
            $table->unsignedInteger(column: 'PorcCuota1');
            $table->unsignedInteger(column: 'CostoOcasional')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costos');
    }
};
