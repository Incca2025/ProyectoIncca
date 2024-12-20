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
        Schema::create('personas', function (Blueprint $table) {
            $table->id('IdPersona');
            $table->string('NumDocIdentidad', 45)->unique();
            $table->unsignedInteger('NumDocIdentidad_Num')->nullable();
            $table->foreignId('IdTipDocIdentidad')->constrained('tipdocidentidad', 'IdTipDocIdentidad');
            $table->string('PriApellido', 45);
            $table->string('SegApellido', 45)->nullable();
            $table->string('PriNombre', 45);
            $table->string('SegNombre', 45)->nullable();
            $table->string('DirResidencia', 200)->nullable();
            $table->string('TelResidencia', 25)->nullable();
            $table->string('MailPersonal', 45);
            $table->date('FecNacimiento')->nullable();
            $table->string('TelCelular', 25);
            $table->foreignId('IdPaisNacimiento')->nullable()->constrained('tippaises', 'IdTipPais');
            $table->foreignId('IdTipMunNacimiento')->nullable()->constrained('tipmunicipios', 'IdTipMunicipio');
            $table->string('OtroMunNacimiento', 45)->nullable();
            $table->foreignId('IdTipDeptoNacimiento')->nullable()->constrained('tipdepartamentos', 'IdTipDepartamento');
            $table->string('OtroDeptoNacimiento', 45)->nullable();
            $table->foreignId('IdPaisResidencia')->nullable()->constrained('tippaises', 'IdTipPais');
            $table->foreignId('IdTipMunResidencia')->nullable()->constrained('tipmunicipios', 'IdTipMunicipio');
            $table->string('OtroMunResidencia', 45)->nullable();
            $table->foreignId('IdTipDeptoResidencia')->nullable()->constrained('tipdepartamentos', 'IdTipDepartamento');
            $table->string('OtroDeptoResidencia', 45)->nullable();
            $table->string('DocExpedidoEn', 45)->nullable();
            $table->string('Nacionalidad', 45)->nullable();
            $table->foreignId('IdTipCapExcepcional')->nullable()->constrained('tipcapexcepcional', 'IdTipCapExcepcional');
            $table->foreignId('IdTipComNegra')->nullable()->constrained('tipcomnegra', 'IdTipComNegra');
            $table->foreignId('IdTipConDiscapacidad')->nullable()->constrained('tipcondiscapacidad', 'IdTipConDiscapacidad');
            $table->foreignId('IdTipDiscapacidad')->nullable()->constrained('tipdiscapacidad', 'IdTipDiscapacidad');
            $table->foreignId('IdTipEstCivil')->nullable()->constrained('tipestcivil', 'IdTipEstCivil');
            $table->foreignId('IdTipEstrato')->nullable()->constrained('tipestrato', 'IdTipEstrato');
            $table->foreignId('IdTipGenBiologico')->nullable()->constrained('tipgenbiologico', 'IdTipGenBiologico');
            $table->foreignId('IdTipGrupEtnico')->nullable()->constrained('tipgrupetnico', 'IdTipGrupEtnico');
            $table->foreignId('IdTipPueIndigena')->nullable()->constrained('tippueindigena', 'IdTipPueIndigena');
            $table->foreignId('IdTipVeteranos')->nullable()->constrained('tipveteranos', 'IdTipVeteranos');
            $table->foreignId('IdTipZonaResidencia')->nullable()->constrained('tipzonaresidencia', 'IdTipZonaResidencia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
