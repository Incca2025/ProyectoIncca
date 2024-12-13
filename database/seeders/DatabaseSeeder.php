<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table("roles")->insert([
            "rol" => "Admin",
            "descripcion" => "Administrador del sistema",
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'IdRol' => 1,
        ]);

        DB::table('inter_estseguimiento')->insert([
            [
                'IdIntEstSeguimiento' => 1,
                'DesIntEstSeguimiento' => 'Registro inicial',
                'ActivaMatricula' => 0,
            ],
            [
                'IdIntEstSeguimiento' => 2,
                'DesIntEstSeguimiento' => 'En Seguimiento',
                'ActivaMatricula' => 0,
            ],
            [
                'IdIntEstSeguimiento' => 3,
                'DesIntEstSeguimiento' => 'Desiste del proceso',
                'ActivaMatricula' => 0,
            ],
            [
                'IdIntEstSeguimiento' => 4,
                'DesIntEstSeguimiento' => 'No responde',
                'ActivaMatricula' => 0,
            ],
            [
                'IdIntEstSeguimiento' => 5,
                'DesIntEstSeguimiento' => 'Prematricula ',
                'ActivaMatricula' => 1,
            ],
        ]);

        DB::table('inter_tipseguimiento')->insert([
            [
                'IdIntTipSeguimiento' => 1,
                'DesTipSeguimiento' => 'Telefónico',
                'InstTipSeguimiento' => 'Prueba Instructivo Telefónico',
            ],
            [
                'IdIntTipSeguimiento' => 2,
                'DesTipSeguimiento' => 'Email',
                'InstTipSeguimiento' => 'Prueba Instructivo Email',
            ],
        ]);

        DB::table('nivprograma')->insert([
            [
                'IdNivPrograma' => 1,
                'DesPrograma' => 'Profesional',
            ],
        ]);

        DB::table('tip_periodopensum')->insert([
            [
                'IdTipPeriodos' => 1,
                'DesTipPeriodos' => 'Semestre',
                'NumMes' => 6,
            ],
            [
                'IdTipPeriodos' => 2,
                'DesTipPeriodos' => 'Cuatrimestre',
                'NumMes' => 4,
            ],
            [
                'IdTipPeriodos' => 3,
                'DesTipPeriodos' => 'Trimestre',
                'NumMes' => 3,
            ],
        ]);

        DB::table('progacademico')->insert([
            [
                'IdProgAcademico' => 1,
                'NomProgAcademico' => 'Administración de empresas',
                'IdNivPrograma' => 1,
                'ResMen' => 16408,
                'FecResMen' => '2013-11-18',
                'Snies' => 14320,
                'CodProgAcademico' => '101',
                'IdTipPeriodos' => 1,
                'NumPeriodos' => 9,
            ],
            [
                'IdProgAcademico' => 2,
                'NomProgAcademico' => 'Biología',
                'IdNivPrograma' => 1,
                'ResMen' => 2662,
                'FecResMen' => '2020-02-21',
                'Snies' => 1063,
                'CodProgAcademico' => '102',
                'IdTipPeriodos' => 1,
                'NumPeriodos' => 10,
            ],
            [
                'IdProgAcademico' => 3,
                'NomProgAcademico' => 'Cultura física',
                'IdNivPrograma' => 1,
                'ResMen' => 7912,
                'FecResMen' => '2020-05-20',
                'Snies' => 1054,
                'CodProgAcademico' => '103',
                'IdTipPeriodos' => 1,
                'NumPeriodos' => 10,
            ],
            [
                'IdProgAcademico' => 4,
                'NomProgAcademico' => 'Derecho - Bogotá',
                'IdNivPrograma' => 1,
                'ResMen' => 9114,
                'FecResMen' => '2014-06-11',
                'Snies' => 1056,
                'CodProgAcademico' => '104',
                'IdTipPeriodos' => 1,
                'NumPeriodos' => 10,
            ],
        ]);

        DB::table('interesado')->insert([
            [
                'IdInteresado' => 1,
                'Nombres_Int' => 'Juan Pablo',
                'Apellidos_Int' => 'Betancourt Vargas',
                'Email_Int' => 'juanbetancourt0013@gmail.com',
                'IdProgAcademico' => 3,
                'Celular_Int' => '3222663866',
                'IdIntEstSeguimiento' => 5,
            ],
        ]);

        DB::table('variables')->insert([
            [
                'IdVariable' => 1,
                'Variable' => 'paginaPrincipal',
                'DesVariable' => 'Página principal de la universidad',
                'NumVariable' => Null,
                'TxtVariable' => 'https://unincca.edu.co/',
            ],
            [
                'IdVariable' => 2,
                'Variable' => 'paginaTrataDatos',
                'DesVariable' => 'Pagina que describe el tratamiento de datos',
                'NumVariable' => Null,
                'TxtVariable' => 'https://unincca.edu.co/TDatos.html',
            ],
            [
                'IdVariable' => 3,
                'Variable' => 'agradecimientoInteresado',
                'DesVariable' => 'Frase de agradecimiento al interesado',
                'NumVariable' => Null,
                'TxtVariable' => 'Gracias por su interés en nuestros programas académicos, un asesor de admisiones se comunicará con usted muy pronto.',
            ]
        ]);

        DB::table('estud_estados')->insert([
            [
                'IdEstEstudiante' => 1,
                'DesEstEstudiante' => 'Activo',
                'ActEstEstudiante' => 1,
            ],
            [
                'IdEstEstudiante' => 2,
                'DesEstEstudiante' => 'Aspirante',
                'ActEstEstudiante' => 1,
            ],
            [
                'IdEstEstudiante' => 3,
                'DesEstEstudiante' => 'Inactivo',
                'ActEstEstudiante' => 0,
            ],
            [
                'IdEstEstudiante' => 4,
                'DesEstEstudiante' => 'Graduado',
                'ActEstEstudiante' => 0,
            ]
        ]);

        DB::table('tippaises')->insert([
            [
                'IdTipPais' => 1,
                'CodPais' => '170',
                'DesPais' => 'Colombia',
            ],
            [
                'IdTipPais' => 2,
                'CodPais' => '032',
                'DesPais' => 'Argentina',
            ],
        ]);

        DB::table('tipdepartamentos')->insert([
            [
                'IdTipDepartamento' => 1,
                'CodDepartamento' => '5',
                'DesDepartamento' => 'Antioquia',
                'IdTipPais' => 1,
            ],
            [
                'IdTipDepartamento' => 2,
                'CodDepartamento' => '11',
                'DesDepartamento' => 'Bogotá D.C.',
                'IdTipPais' => 1,
            ],
        ]);

        DB::table('tipmunicipios')->insert([
            [
                'IdTipMunicipio' => 1,
                'CodMunicipio' => '5001',
                'DesMunicipio' => 'Medellín',
                'IdTipPais' => 1,
                'IdTipDepartamento' => 1,
            ],
            [
                'IdTipMunicipio' => 2,
                'CodMunicipio' => '11001',
                'DesMunicipio' => 'Bogotá D.C.',
                'IdTipPais' => 1,
                'IdTipDepartamento' => 2,
            ],
        ]);

        DB::table('tipzonaresidencia')->insert([
            [
                'IdTipZonaResidencia' => 1,
                'CodMenZResidencial' => '1',
                'DesZonaResidencial' => 'Urbana',
            ],
        ]);

        DB::table('tipdocidentidad')->insert([
            [
                'IdTipDocIdentidad' => 1,
                'AbreDocIdentidad' => 'CC',
                'DesDocidentidad' => 'Cédula de ciudadanía',
                'DocDian' => 0,
            ],
        ]);

        DB::table('tippueindigena')->insert([
            [
                'IdTipPueIndigena' => 1,
                'CodMenPIndigena' => '0',
                'DesPueIndigena' => 'No aplica',
            ],
        ]);

        DB::table('tipveteranos')->insert([
            [
                'IdTipVeteranos' => 1,
                'CodMenVetarno' => '1',
                'DesVeterano' => 'Veterano',
            ],
        ]);

        DB::table('tipgrupetnico')->insert([
            [
                'IdTipGrupEtnico' => 1,
                'CodMenGEtnico' => '0',
                'DesGrupEtnico' => 'No informa',
            ],
        ]);

        DB::table('tipgenbiologico')->insert([
            [
                'IdTipGenBiologico' => 1,
                'CodMenGBio' => '1',
                'DesGenBiologico' => 'Hombre-Masculino',
            ],
        ]);

        DB::table('tipestrato')->insert([
            [
                'IdTipEstrato' => 1,
                'CodMenEstrato' => '0',
                'DesEstrato' => 'No informa',
            ],
        ]);

        DB::table('tipestcivil')->insert([
            [
                'IdTipEstCivil' => 1,
                'CodMenEstCivil' => '1',
                'DesEstCivil' => 'Soltero(a)',
            ],
        ]);

        DB::table('tipdiscapacidad')->insert([
            [
                'IdTipDiscapacidad' => 1,
                'CodMenDiscap' => '0',
                'DesDiscapacidad' => 'No aplica',
            ],
        ]);

        DB::table('tipcondiscapacidad')->insert([
            [
                'IdTipConDiscapacidad' => 1,
                'CodMenCDiscap' => '0',
                'DesConDiscapacidad' => 'No informa',
            ],
        ]);

        DB::table('tipcomnegra')->insert([
            [
                'IdTipComNegra' => 1,
                'CodMenCN' => '0',
                'DesComNegra' => 'No aplica',
            ],
        ]);

        DB::table('tipcapexcepcional')->insert([
            [
                'IdTipCapExcepcional' => 1,
                'CodMenCExpc' => '0',
                'DesCapExcepcional' => 'No aplica',
            ],
        ]);

    }
}
