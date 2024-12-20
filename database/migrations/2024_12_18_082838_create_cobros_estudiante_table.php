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
        Schema::create('cobros_estudiante', function (Blueprint $table) {
            $table->id('IdCobros');
            $table->foreignId('IdCostEstudiante')->constrained('costos_estudiante', 'IdCostEstudiante');
            $table->unsignedInteger('NumCuota');
            $table->decimal('ValorCobro', 10, 2);
            $table->decimal('ValorAbonado', 10, 2);
            $table->unsignedInteger('MesCobro');
            $table->unsignedInteger('YearCobro');
            $table->string('IdFacturaPSE', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cobros_estudiante');
    }
};
