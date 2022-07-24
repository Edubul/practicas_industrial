<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EncuestasRespuestasFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'num_control' => strval($this->faker->randomNumber()),
            'pregunta_id' => 1,
            'respuesta' => $this->faker->word(),
            'pregunta_id1' => 2,
            'respuesta1' => $this->faker->word(),
            'pregunta_id2' => 3,
            'respuesta2' => $this->faker->word(),
            'pregunta_id3' => 4,
            'respuesta3' => $this->faker->word(),
            'pregunta_id4' => 5,
            'respuesta4' => $this->faker->word(),
            'pregunta_id5' => 6,
            'respuesta5' => $this->faker->word(),
            'pregunta_id6' => 7,
            'respuesta6' => $this->faker->word(),
            'pregunta_id7' => 8,
            'respuesta7' => $this->faker->word(),
            'pregunta_id8' => 9,
            'respuesta8' => $this->faker->word(),
            'pregunta_id9' => 10,
            'respuesta9' => $this->faker->word(),
        ];
    }
}
