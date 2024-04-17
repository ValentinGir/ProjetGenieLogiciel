<?php

namespace Database\Seeders;

use App\Models\Domaine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('domaines')->insert(
           [[
               'libelle' => 'domaine1'
                ],
               [
                   'libelle' => 'domaine2'
               ],
               [
                   'libelle' => 'domaine3'
               ],
               [
                   'libelle' => 'domaine4'
               ],
               [
                   'libelle' => 'domaine5'
               ],
               [
                   'libelle' => 'domaine6'
               ]]
        );

    }
}
