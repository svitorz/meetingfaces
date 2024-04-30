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
            'sigla' => 'IMF',
            'parcerias' => 'não tem parcerias',
            'data_fundacao' => '01/01/2021',
            'tipo_organizacao' => 'ONG',
            'descricao' => 'Criado para realização de testes',
            'cnpj' => '11.111.1111/0001-11',
            'email' => 'imf@gmail.com',
            'telefone' => '(11)11111-1111',
            'url' => 'github.com/svitorz',
            'cep' => '15530-000',
            'numero' => '111',
            'rua' => 'Rua São Paulo',
            'cidade' => 'São Paulo',
            'bairro' => 'Centro',
            'estado' => 'SP',
            'pais' => 'Brasil',
            'id_usuario' => User::class::factory(),
        ];
    }
}
