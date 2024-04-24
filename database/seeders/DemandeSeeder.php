<?php

namespace Database\Seeders;

use App\Models\Demande;
use Database\Factories\DemandeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Demande::factory()->count(20)->create();
    }
}
