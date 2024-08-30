<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoSekilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_sekilas', function (Blueprint $table) {
            $table->id();
            $table->integer('total_posyandu')->unsigned();
            $table->integer('total_kader')->unsigned();
            $table->integer('pasien')->unsigned();
            $table->integer('pasien_balita')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_sekilas');
    }
}

