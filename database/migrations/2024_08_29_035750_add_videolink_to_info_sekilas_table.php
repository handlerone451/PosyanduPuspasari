<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('info_sekilas', function (Blueprint $table) {
            $table->string('videolink')->nullable()->after('pasien_balita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info_sekilas', function (Blueprint $table) {
            $table->dropColumn('videolink');
        });
    }
};
