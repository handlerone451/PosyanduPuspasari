<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosyanduSeeder extends Seeder
{
    /**
     * Seed the posyandu table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posyandu')->insert([
            [
                'nama' => 'Posyandu Melati Rw 01',
                'alamat' => 'Dusun Jambatan RT 02/RW 01 Desa Puspasari, Citeureup',
                'rw' => '01',
                'gambar' => 'melati01.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu 2',
                'alamat' => 'Dusun Jambatan RT01/ RW 02 Desa Puspasari  kec.Citeureup, kab Bogor',
                'rw' => '02',
                'gambar' => 'Anggrek02.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu Kemuning Rw 03',
                'alamat' => 'Jalan Keranggan RT 1 RW 3',
                'rw' => '03',
                'gambar' => 'kemuning03.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu Mawar Rw 04',
                'alamat' => 'jl karanggan RT 03/04..puspasari ',
                'rw' => '04',
                'gambar' => 'mawar06.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu dahlia rw 05',
                'alamat' => 'Gg. Musolah Gg. AL-Ikhwan No.22, RT.03/RW.05, Puspasari, Kec. Citeureup, Kabupaten Bogor, Jawa Barat 16810',
                'rw' => '05',
                'gambar' => 'dahlia05.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu Seroja I Rw 6',
                'alamat' => 'Kp Jl. Raya Kamurang, Puspanegara, Kec. Citeureup, Kabupaten Bogor, Jawa Barat 16810',
                'rw' => '06',
                'gambar' => 'mawar06.jpeg',    
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu Seroja II Rw 07',
                'alamat' => 'Dusun kamurang gg seroja rt 02 rw 07',
                'rw' => '07',
                'gambar' => 'Seroja07.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu cempaka wangi Rw 08',
                'alamat' => 'Jln R.E Sulaeman kampung kebon kopi Rt 02 /Rw 08 Desa Puspasari .Kecamatan Citeureup Kabupaten Bogor',
                'rw' => '09',
                'gambar' => 'Merpati10.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

