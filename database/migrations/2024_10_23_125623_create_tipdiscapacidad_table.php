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
        Schema::create('tipdiscapacidad', function (Blueprint $table) {
            $table->id('IdTipDiscapacidad');
            $table->string('CodMenDiscap', 5)->unique();
            $table->string('DesDiscapacidad', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipdiscapacidad');
    }
};
