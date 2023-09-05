<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jabatan_id');
            $table->string('nama', 100);
            $table->char('nip', 15)->unique();
            $table->string('tempatLahir', 100);
            $table->date('tanggalLahir');
            $table->enum('jenisKelamin', ['Laki-Laki', 'Perempuan']);
            $table->char('noTelepon', 13);
            $table->string('alamat', 100);
            $table->timestamps();
            $table->foreign('jabatan_id')->references('id')->on('jabatan');
        });
    }
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
