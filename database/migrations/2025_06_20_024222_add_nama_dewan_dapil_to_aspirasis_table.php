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
            $table->string('nama_dewan')->after('kategori');
            $table->string('dapil')->after('nama_dewan');
        });
    }

    public function down()
    {
        Schema::table('aspirasis', function (Blueprint $table) {
            $table->dropColumn(['nama_dewan', 'dapil']);
        });
    }

};
