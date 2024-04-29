<?php

namespace Database\Seeders;

use App\Models\Matiere;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matieres')->insert(
            [
                [
                    'libelle' => 'matiere1',
                    'domaine_id' => 1
                ],
                [
                    'libelle' => 'matiere2',
                    'domaine_id' => 2
                ], 
                [
                    'libelle' => 'matiere3',
                    'domaine_id' => 3
                ],
                [
                    'libelle' => 'matiere4',
                    'domaine_id' => 4
                ],
                [
                    'libelle' => 'matiere5',
                    'domaine_id' => 5
                ],
                [
                    'libelle' => 'matiere6',
                    'domaine_id' => 6
                ]
            ]
        );
    }
}
