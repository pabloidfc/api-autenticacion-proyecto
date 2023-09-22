<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UbicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => 1,
            "departamento" => $this->faker->state(),
            "calle" => $this->faker->streetName(),
            "nro_de_puerta" => $this->faker->randomDigit(),
        ];
    }
}
