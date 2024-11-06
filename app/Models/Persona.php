<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $primaryKey = 'IdPersona';

    protected $fillable = [
        'NumDocIdentidad',
        'NumDocIdentidad_Num',
        'IdTipDocIdentidad',
        'PriApellido',
        'SegApellido',
        'PriNombre',
        'SegNombre',
        'DirResidencia',
        'TelResidencia',
        'MailPersonal',
        'MailInstitucional',
        'FecNacimiento',
        'TelCelular',
        'IdPaisNacimiento',
        'IdTipMunNacimiento',
        'OtroMunNacimiento',
        'IdTipDeptoNacimiento',
        'OtroDeptoNacimiento',
        'IdPaisResidencia',
        'IdTipMunResidencia',
        'OtroMunResidencia',
        'IdTipDeptoResidencia',
        'OtroDeptoResidencia',
        'DocExpedidoEn',
        'Nacionalidad',
        'IdTipCapExcepcional',
        'IdTipComNegra',
        'IdTipConDiscapacidad',
        'IdTipDiscapacidad',
        'IdTipEstCivil',
        'IdTipEstrato',
        'IdTipGenBiologico',
        'IdTipGrupEtnico',
        'IdTipPueIndigena',
        'IdTipVeteranos',
        'IdTipZonaResidencia'
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'IdTipDocIdentidad');
    }

    public function paisNacimiento()
    {
        return $this->belongsTo(Pais::class, 'IdPaisNacimiento');
    }

    public function paisResidencia()
    {
        return $this->belongsTo(Pais::class, 'IdPaisResidencia');
    }

    public function municipioNacimiento()
    {
        return $this->belongsTo(Municipio::class, 'IdTipMunNacimiento');
    }

    public function municipioResidencia()
    {
        return $this->belongsTo(Municipio::class, 'IdTipMunResidencia');
    }

    public function departamentoNacimiento()
    {
        return $this->belongsTo(Departamento::class, 'IdTipDeptoNacimiento');
    }

    public function departamentoResidencia()
    {
        return $this->belongsTo(Departamento::class, 'IdTipDeptoResidencia');
    }

    public function capacidadExcepcional()
    {
        return $this->belongsTo(CapacidadExcepcional::class, 'IdTipCapExcepcional');
    }

    public function comunidadNegra()
    {
        return $this->belongsTo(ComunidadNegra::class, 'IdTipComNegra');
    }

    public function conDiscapacidad()
    {
        return $this->belongsTo(ConDiscapacidad::class, 'IdTipConDiscapacidad');
    }

    public function discapacidad()
    {
        return $this->belongsTo(Discapacidad::class, 'IdTipDiscapacidad');
    }

    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'IdTipEstCivil');
    }

    public function estrato()
    {
        return $this->belongsTo(Estrato::class, 'IdTipEstrato');
    }

    public function generoBiologico()
    {
        return $this->belongsTo(GeneroBiologico::class, 'IdTipGenBiologico');
    }

    public function grupoEtnico()
    {
        return $this->belongsTo(GrupoEtnico::class, 'IdTipGrupEtnico');
    }

    public function puebloIndigena()
    {
        return $this->belongsTo(PuebloIndigena::class, 'IdTipPueIndigena');
    }

    public function leyVeteranos()
    {
        return $this->belongsTo(LeyVeteranos::class, 'IdTipVeteranos');
    }

    public function zonaResidencia()
    {
        return $this->belongsTo(ZonaResidencia::class, 'IdTipZonaResidencia');
    }

    protected static function booted()
    {
        static::saving(function ($persona) {
            $persona->NumDocIdentidad_Num = preg_replace('/[^0-9]/', '', $persona->NumDocIdentidad);
            if (self::where('NumDocIdentidad_Num', $persona->NumDocIdentidad_Num)->exists()) {
                throw new \Exception('El número de documento de identidad ya existe.');
            }
        });
    }

}
