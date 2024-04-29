<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use App\Models\Matiere;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création des utilisateurs
        $users = [
            [
                'name' => 'John',
                'surname' => 'Doe',
                'telephone' => '1234567890',
                'email' => 'john@example.com',
                'domaine_id' => 1,
                'role_id' => 3,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin',
                'surname' => 'admin',
                'telephone' => '8888888888',
                'email' => 'admin@admin.com',
                'domaine_id' => 1,
                'role_id' => 2,
                'password' => Hash::make('admin12345')
            ],
            [
                'name' => 'Tuteur',
                'surname' => 'Tuteur',
                'telephone' => '9999999999',
                'email' => 'tuteur@example.com',
                'domaine_id' => 1,
                'role_id' => 3,
                'password' => Hash::make('tuteur12345')
            ]
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
        
            if ($user->id === 1) {
                $matieres = Matiere::all();
                $user->matieres()->attach($matieres->pluck('id'));
            }
        
            if ($user->id === 3) {
                $matieres = Matiere::take(3)->get();
                $user->matieres()->attach($matieres->pluck('id'));
            }
        }
        
    }
}
