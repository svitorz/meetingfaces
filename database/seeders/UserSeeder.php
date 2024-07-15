<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'nome' => 'Vitor Souza',
            'email' => 'vitor1@gmail.com',
            'password' => Hash::make('12345678'),
            'data_nasc' => '01/01/2001',
            'telefone' => '(11) 11111-1111',
            'permissao' => 'comum',
        ]);

        User::factory()->create([
            'nome' => 'Vitor Souza',
            'email' => 'vitor@gmail.com',
            'password' => Hash::make('12345678'),
            'data_nasc' => '01/01/2001',
            'telefone' => '(11) 11111-1111',
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
