<?php

namespace Database\Factories;

use App\Models\Morador;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comentario' => fake()->sentence(),
            'id_morador' => Morador::factory(),
            'id_usuario' => User::factory(),
            'situacao' => 'pendente'
        ];
    }
}
