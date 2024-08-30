<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('posyandu_id');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('posyandu_id')->references('id')->on('posyandu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
