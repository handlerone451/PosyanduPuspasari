<?php

namespace Database\Seeders;

use App\Models\InfoSekilas;
use App\Models\Posyandu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(infosekilasSeeder::class);
        $this->call(PosyanduSeeder::class);
    }
}
