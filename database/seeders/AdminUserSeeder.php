<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['login' => 'copp'], 
            [
                'name' => 'Администратор',
                'lastname' => '',
                'middlename' => 'Главный',
                'email' => 'admin@copp.ru',
                'tel' => '88005553535',
                'password' => Hash::make('password'), 
                'role' => User::ADMIN_ROLE, 
            ]
        );
    }
}
