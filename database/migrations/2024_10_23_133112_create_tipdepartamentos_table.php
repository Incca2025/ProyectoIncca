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
        Schema::create('tipdepartamentos', function (Blueprint $table) {
            $table->id('IdTipDepartamento');
            $table->string('CodDepartamento', 5)->unique();
            $table->string('DesDepartamento', 45);
            $table->foreignId('IdTipPais')->constrained('tippaises', 'IdTipPais');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipdepartamentos');
    }
};
