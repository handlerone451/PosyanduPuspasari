<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $user = User::create([
            'name' => 'Funny Ackerman',
            'email' => 'funny@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $user->assignRole($adminRole);
    }
}
