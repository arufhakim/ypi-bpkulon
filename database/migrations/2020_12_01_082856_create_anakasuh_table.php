<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakAsuhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anakasuh', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->double('bantuan');
            $table->string('tempatLahir', 100);
            $table->date('tanggalLahir');
            $table->enum('jenisKelamin', ['Laki-Laki', 'Perempuan']);
            $table->char('noTeleponOrtu', 13);
            $table->string('alamat', 100);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('anakasuh');
    }
}
