<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'الادمن الرئيسي',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => ' المشرف',
            'email' => 'supervisor@supervisor.com',
            'email_verified_at' => now(),
            'password' => bcrypt('supervisor'),
            'role_id' => 2,
        ]);

        // User::create([
        //     'name' => ' المستخدم ',
        //     'email' => 'user@user.com',
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('user'),
        //     'role_id' => 3,
        // ]);
    }
}