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
        Schema::create('estudiante', function (Blueprint $table) {
            $table->foreignId('IdPersona')->primary()->constrained('personas', 'IdPersona');
            $table->string('CodEstudiante', 20);
            $table->string('EmailEstudiante', 80);
            $table->foreignId(column: 'IdEstEstudiante')->constrained('estud_estados', 'IdEstEstudiante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante');
    }
};
