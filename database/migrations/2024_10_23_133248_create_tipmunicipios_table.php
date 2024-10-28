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
        Schema::create('tipmunicipios', function (Blueprint $table) {
            $table->id('IdTipMunicipio');
            $table->string('CodMunicipio', 5)->unique();
            $table->string('DesMunicipio', 45);
            $table->foreignId('IdTipPais')->constrained('tippaises', 'IdTipPais');
            $table->foreignId('IdTipDepartamento')->constrained('tipdepartamentos', 'IdTipDepartamento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipmunicipios');
    }
};
