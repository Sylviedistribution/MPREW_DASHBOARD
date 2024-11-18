<?php

namespace Database\Seeders;

use App\Models\Artisans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisans::factory()->count(2)->create();

    }
}
