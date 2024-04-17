<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [[
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
                ]]);
    }
}
