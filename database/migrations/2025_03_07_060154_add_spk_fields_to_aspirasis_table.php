<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('aspirasis', function (Blueprint $table) {
        $table->tinyInteger('urgensi')->nullable()->after('file_path');
        $table->tinyInteger('cakupan_wilayah')->nullable()->after('urgensi');
        $table->tinyInteger('dampak_sosial')->nullable()->after('cakupan_wilayah');
        $table->tinyInteger('kategori')->nullable()->after('dampak_wilayah');
        $table->float('skor')->nullable()->after('kategori'); // hasil perhitungan SMART
    });
}

public function down()
{
    Schema::table('aspirasis', function (Blueprint $table) {
        $table->dropColumn(['urgensi', 'cakupan_wilayah', 'dampak_sosial', 'kategori', 'skor']);
    });
}

};
