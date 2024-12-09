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
        Schema::create('estud_estados', function (Blueprint $table) {
            $table->unsignedBigInteger('IdEstEstudiante')->primary();
            $table->string('DesEstEstudiante', 20);
            $table->unsignedInteger('ActEstEstudiante')->default(1); // Estudiante Activo todavía en la institución o no
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estud_estados');
    }
};
