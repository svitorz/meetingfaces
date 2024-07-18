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
        /*         User::factory()->create([
                    'nome' => 'Vitor Souza',
                    'email' => 'vitor1@gmail.com',
                    'password' => Hash::make('12345678'),
                    'data_nasc' => '01/01/2001',
                    'telefone' => '(11) 11111-1111',
                    'permissao' => 'comum',
                ]);
         */
        User::factory()->create([
            'nome' => 'Vitor Souza',
            'email' => 'vitor@gmail.com',
            'password' => Hash::make('12345678'),
            'data_nasc' => '01/01/2001',
            'telefone' => '(11) 11111-1111',
            'permissao' => 'admin',
        ]);
    }
}
