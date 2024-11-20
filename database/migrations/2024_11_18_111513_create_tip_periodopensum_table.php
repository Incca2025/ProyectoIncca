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
        Schema::create('tip_periodopensum', function (Blueprint $table) {
            $table->id('IdTipPeriodos');   
            $table->string('DesTipPeriodos', 45);
            $table->unsignedInteger('NumMes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tip_periodopensum');
    }
};
