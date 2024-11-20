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
        Schema::create('inter_estseguimiento', function (Blueprint $table) {
            $table->unsignedBigInteger('IdIntEstSeguimiento')->primary();
            $table->string('DesIntEstSeguimiento', 45);
            $table->unsignedInteger('ActivaMatricula')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inter_estseguimiento');
    }
};
