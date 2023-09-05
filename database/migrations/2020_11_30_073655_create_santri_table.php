<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenjang_id');
            $table->string('nama', 100);
            $table->char('nis', 15)->unique();
            $table->double('spp');
            $table->string('tempatLahir', 100);
            $table->date('tanggalLahir');
            $table->enum('jenisKelamin', ['Laki-Laki', 'Perempuan']);
            $table->char('noTeleponOrtu', 13);
            $table->string('alamat', 100);
            $table->timestamps();
            $table->foreign('jenjang_id')->references('id')->on('jenjang');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('santri');
    }
}
