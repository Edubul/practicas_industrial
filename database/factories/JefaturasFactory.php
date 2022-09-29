<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jefaturas>
 */
class JefaturasFactory extends Factory
{
    private static $c = 0;
    private $jefaturas = [
        'Jefatura de Laboratorio',
        'Jefatura de Proyectos de Vinculación',
        'Jefatura de Proyectos de Docencia ',
        'Presidencia de Academia',
        'Jefatura de Proyectos de Investigación',
        'Jefatura de Departamento',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->jefaturas[self::$c++],
        ];
    }
}
