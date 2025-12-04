<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    public function run(): void
    {
        Mitra::factory()->count(500)->create();
    }
}
