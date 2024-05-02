<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ong>
 */
class OngFactory extends Factory
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
            'sigla' => fake()->name(),
            'parcerias' => fake()->paragraph(),
            'data_fundacao' => fake()->date(),
            'tipo_organizacao' => 'ONG',
            'descricao' => fake()->paragraph,
            'cnpj' => '11.111.1111/0001-11',
            'email' => fake()->email(),
            'telefone' => fake()->phoneNumber(),
            'url' => fake()->url(),
            'cep' => fake()->citySuffix(),
            'numero' => fake()->randomNumber(),
            'rua' => fake()->streetName(),
            'cidade' => fake()->city(),
            'bairro' => fake()->streetAddress(),
            'estado' => fake()->streetSuffix(),
            'pais' => fake()->country(),
            'id_usuario' => User::class::factory()->admin(),
        ];
    }
}
