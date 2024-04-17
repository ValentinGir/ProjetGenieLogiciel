<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disponibilite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class DisponibilitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('disponibilites')->insert(
            [[
            'user_id' => 1,
            'jour_semaine' => 'lundi',
            'heure_debut' => '08:00:00',
            'heure_fin' => '12:00:00',
            ],

            [
            'user_id' => 1,
            'jour_semaine' => 'mardi',
            'heure_debut' => '09:00:00',
            'heure_fin' => '13:00:00',
            ],

            [
            'user_id' => 1,
            'jour_semaine' => 'mercredi',
            'heure_debut' => '10:00:00',
            'heure_fin' => '14:00:00',
            ]]
        );
    }
}
