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
            ]
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
                'Variable' => 'paginaPrincipal',
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

    }
}
