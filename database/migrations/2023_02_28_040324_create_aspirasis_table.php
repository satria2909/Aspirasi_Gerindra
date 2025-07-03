<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspirasisTable extends Migration
{
    public function up()
    {
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('tujuan');
            $table->text('message');
            $table->string('file_path')->nullable(); // kolom untuk menyimpan nama/path file
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aspirasis');
    }
}
