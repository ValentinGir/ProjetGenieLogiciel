<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name'=>'admin',
                    'surname'=>'admin',
                    'telephone'=>'8888888888',
                    'email'=>'admin@admin.com',
                    'domaine_id'=>1,
                    'role_id'=>2,
                    'password'=>Hash::make('admin12345')
                ]
            ]
        );
    }

}
