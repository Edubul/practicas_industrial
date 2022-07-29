<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoriaProductosFactory extends Factory
{

    private static $categorias = [
        'Equipo de Oficina y Papelería / Consumibles',
        'Equipo de Oficina y Papelería / Equipo electrónico',
        'Equipo de Protección General / Personal (EPP)',
        'Equipo de Protección General / Seguridad',
        'Herramientas manuales',
        'Herramientas mecánicas',
        'Instrumentos de medición / Master',
        'Instrumentos de medición / Uso general',
        'Material  didáctico',
        'Refacciones',
        'Maquinaria'
    ];

    private static $count_cat = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_categoria' => self::$categorias[self::$count_cat++],
        ];
    }
}
