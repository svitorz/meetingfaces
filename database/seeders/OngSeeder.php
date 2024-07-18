<?php

namespace Database\Seeders;

use App\Models\Ong;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class OngSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ong::factory()->create([
            'nome_completo' => 'Instituição Meeting Faces',
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
            'id_usuario' => User::select('id')->where('email', '=', 'vitor@gmail.com')->value('id'),
        ]);
        // Ong::factory(10)->create();
    }
}
