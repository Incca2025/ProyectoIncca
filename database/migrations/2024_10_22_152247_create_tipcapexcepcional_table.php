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
        Schema::create('tipcapexcepcional', function (Blueprint $table) {
            $table->id('IdTipCapExcepcional');
            $table->string('CodMenCExpc', 5)->unique();
            $table->string('DesCapExcepcional', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipcapexcepcional');
    }
};
