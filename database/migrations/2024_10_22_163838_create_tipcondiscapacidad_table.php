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
        Schema::create('tipcondiscapacidad', function (Blueprint $table) {
            $table->id('IdTipConDiscapacidad');
            $table->string('CodMenCDiscap', 5)->unique();
            $table->string('DesConDiscapacidad', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipcondiscapacidad');
    }
};
