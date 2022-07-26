<?php

namespace Database\Seeders;

use App\Models\Archivos;
use App\Models\CategoriaProductos;
use App\Models\EncuestasRespuestas;
use App\Models\Horarios;
use App\Models\Jefaturas;
use App\Models\Materias;
use App\Models\PreguntasEncuesta;
use App\Models\Talleres;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'num_control' => '12345678',
            'email' => 'a@a.com',
            'password' => bcrypt('123456'),
        ]);

        Horarios::factory(7)->create();
        Talleres::factory(4)->create();
        PreguntasEncuesta::factory(10)->create();
        EncuestasRespuestas::factory(10)->create();
        CategoriaProductos::factory(11)->create();
        // Archivos::factory(60)->create();
        Materias::factory(60)->create();
        Jefaturas::factory(6)->create();
    }
}
