<?php

namespace Database\Seeders;

use App\Models\HasilPengujian;
use Illuminate\Database\Seeder;

class HasilPengujianSeeder extends Seeder
{
    public function run(): void
    {
        HasilPengujian::factory()->count(50)->create();
    }
}
