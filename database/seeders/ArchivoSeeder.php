<?php

namespace Database\Seeders;

use App\Models\archivo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        archivo::factory(10)->create();
    }
}
