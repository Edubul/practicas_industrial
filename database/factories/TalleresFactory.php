<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TalleresFactory extends Factory
{

    private static $id = 0;
    private $talleres = ['Taller de Ergonomía', 'Taller de Ing. Inversa', 'Taller de Manufactura', 'Taller de Metrología'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->talleres[self::$id++],
        ];
    }
}
