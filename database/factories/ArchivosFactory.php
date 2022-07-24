<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Archivos>
 */
class ArchivosFactory extends Factory
{
    private static $c = 0;
    private static $archivo_count = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => "practica_" . self::$c++ . ".pdf",
            'url' => 'storage/practica_' . self::$archivo_count++ . '.pdf',
            'aprobado' => false,
        ];
    }
}
