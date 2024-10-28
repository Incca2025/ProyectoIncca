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
        Schema::create('tipveteranos', function (Blueprint $table) {
            $table->id('IdTipVeteranos');
            $table->string('CodMenVetarno', 5)->unique();
            $table->string('DesVeterano', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipveteranos');
    }
};
