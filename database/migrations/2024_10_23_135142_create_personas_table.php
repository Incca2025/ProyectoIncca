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
            $table->integer('NumDocIdentidad_Num')->nullable();
            $table->foreignId('IdTipDocIdentidad')->constrained('tipdocidentidad', 'IdTipDocIdentidad');
            $table->string('PriApellido', 45);
            $table->string('SegApellido', 45)->nullable();
            $table->string('PriNombre', 45);
            $table->string('SegNombre', 45)->nullable();
            $table->string('DirResidencia', 200);
            $table->string('TelResidencia', 25)->nullable();
            $table->string('MailPersonal', 45);
            $table->string('MailInstitucional', 45);
            $table->date('FecNacimiento');
            $table->string('TelCelular', 25);
            $table->foreignId('IdPaisNacimiento')->constrained('tippaises', 'IdTipPais');
            $table->foreignId('IdTipMunNacimiento')->nullable()->constrained('tipmunicipios', 'IdTipMunicipio');
            $table->string('OtroMunNacimiento', 45)->nullable();
            $table->foreignId('IdTipDeptoNacimiento')->nullable()->constrained('tipdepartamentos', 'IdTipDepartamento');
            $table->string('OtroDeptoNacimiento', 45)->nullable();
            $table->foreignId('IdPaisResidencia')->constrained('tippaises', 'IdTipPais');
            $table->foreignId('IdTipMunResidencia')->nullable()->constrained('tipmunicipios', 'IdTipMunicipio');
            $table->string('OtroMunResidencia', 45)->nullable();
            $table->foreignId('IdTipDeptoResidencia')->nullable()->constrained('tipdepartamentos', 'IdTipDepartamento');
            $table->string('OtroDeptoResidencia', 45)->nullable();
            $table->string('DocExpedidoEn', 45);
            $table->string('Nacionalidad', 45)->nullable();
            $table->foreignId('IdTipCapExcepcional')->constrained('tipcapexcepcional', 'IdTipCapExcepcional');
            $table->foreignId('IdTipComNegra')->constrained('tipcomnegra', 'IdTipComNegra');
            $table->foreignId('IdTipConDiscapacidad')->constrained('tipcondiscapacidad', 'IdTipConDiscapacidad');
            $table->foreignId('IdTipDiscapacidad')->constrained('tipdiscapacidad', 'IdTipDiscapacidad');
            $table->foreignId('IdTipEstCivil')->constrained('tipestcivil', 'IdTipEstCivil');
            $table->foreignId('IdTipEstrato')->constrained('tipestrato', 'IdTipEstrato');
            $table->foreignId('IdTipGenBiologico')->constrained('tipgenbiologico', 'IdTipGenBiologico');
            $table->foreignId('IdTipGrupEtnico')->constrained('tipgrupetnico', 'IdTipGrupEtnico');
            $table->foreignId('IdTipPueIndigena')->constrained('tippueindigena', 'IdTipPueIndigena');
            $table->foreignId('IdTipVeteranos')->constrained('tipveteranos', 'IdTipVeteranos');
            $table->foreignId('IdTipZonaResidencia')->constrained('tipzonaresidencia', 'IdTipZonaResidencia');
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
