<?php

namespace Database\Seeders;

use App\Models\User;
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
            'senha' => Hash::make('12345678'),
            'data_nasc' => '07/08/2006',
            'telefone' => '(17) 98126-7735',
            'permissao' => 'comum',
        ]);
    }
}
