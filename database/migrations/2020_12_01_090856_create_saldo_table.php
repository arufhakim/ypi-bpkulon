<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo', function (Blueprint $table) {
            $table->id();
            $table->string('jenisSaldo', 100);
            $table->double('jumlahSaldo');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('saldo');
    }
}
