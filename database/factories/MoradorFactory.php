<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Morador>
 */
class MoradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome_completo' => fake()->name(),
            'cidade_atual' => fake()->city(),
            'cidade_natal' => fake()->city(),
            'nome_familiar_proximo' => fake()->name(),
            'grau_parentesco' => 'Primo',
            'data_nasc' => fake()->date(),
            'id_ong' => 1,
        ];
    }
}
