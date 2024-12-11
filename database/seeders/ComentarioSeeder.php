<?php

namespace Database\Seeders;

use App\Models\comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        comentario::factory()->count(10)->create();
    }
}
