<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anakasuh_id');
            $table->enum('jenjangSekolah', ['SD/MI', 'SMP/MTs', 'SMA/MA', 'SMK/MAK']);
            $table->string('namaSekolah', 100);
            $table->enum('kelas', ['1', '2', '3', '4', '5', '6']);
            $table->double('sppSekolah');
            $table->timestamps();
            $table->foreign('anakasuh_id')->references('id')->on('anakasuh')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}
