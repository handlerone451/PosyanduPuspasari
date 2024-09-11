<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\infosekilas;

class InfoSekilasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        infosekilas::create([
            'total_posyandu' => 15,
            'total_kader' => 99,
            'pasien' => 1200,
            'pasien_balita' => 350,
        ]);
    }
}