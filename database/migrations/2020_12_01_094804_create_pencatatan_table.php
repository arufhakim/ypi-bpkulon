<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saldo_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('anakasuh_id')->nullable();
            $table->unsignedBigInteger('donatur_id')->nullable();
            $table->unsignedBigInteger('santri_id')->nullable();
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->string('namaPencatatan', 100);
            $table->date('tanggalPencatatan')->index();
            $table->enum('jenisPencatatan', ['Pemasukan','Pengeluaran'])->index();
            $table->double('jumlah');
            $table->string('keterangan', 100)->nullable();
            $table->string('oleh', 100);
            $table->timestamps();
            $table->foreign('anakasuh_id')->references('id')->on('anakasuh');
            $table->foreign('donatur_id')->references('id')->on('donatur');
            $table->foreign('santri_id')->references('id')->on('santri');
            $table->foreign('guru_id')->references('id')->on('guru');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('saldo_id')->references('id')->on('saldo');
        });
    }
  
    public function down()
    {
        Schema::dropIfExists('pencatatan');
    }
}
