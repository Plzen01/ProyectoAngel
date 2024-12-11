<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'estudiante_id'=> $this->faker->numberBetween(1,100),
            'profesor_id'=> $this->faker->numberBetween(1,100),
            'estado' => $this->faker->randomElement(['activo','completado']),
        ];
    }
}
