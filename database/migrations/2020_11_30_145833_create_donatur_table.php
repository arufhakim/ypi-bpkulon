<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonaturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donatur', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->double('donasi');
            $table->enum('jenisKelamin', ['Laki-Laki', 'Perempuan']);
            $table->char('noTelepon', 13);
            $table->string('alamat', 100);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('donatur');
    }
}
