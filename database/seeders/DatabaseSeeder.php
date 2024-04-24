<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ong;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nome' => 'Vitor Souza',
            'email' => 'vitor@gmail.com',
            'password' => Hash::make('12345678'),
            'data_nasc' => '07/08/2006',
            'telefone' => '(17) 98126-7735',
            'permissao' => 'admin',
        ]);

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
            'id_usuario' => 1,
        ]);
    }
}
