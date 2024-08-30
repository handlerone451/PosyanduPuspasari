<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePosyanduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posyandu', function (Blueprint $table) {
            // Hapus kolom nomor_kontak
            $table->dropColumn('kontak');

            // Tambahkan kolom gambar
            $table->string('gambar')->nullable()->after('RW'); // Sesuaikan penempatan kolom sesuai kebutuhan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posyandu', function (Blueprint $table) {
            // Tambahkan kembali kolom kontak
            $table->string('kontak')->nullable();

            // Hapus kolom gambar
            $table->dropColumn('gambar');
        });
    }
};
