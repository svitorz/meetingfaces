<?php

namespace Database\Seeders;

use App\Models\Morador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Morador::factory(10)->create();
    }
}
