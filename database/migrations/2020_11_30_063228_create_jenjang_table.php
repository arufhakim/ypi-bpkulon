<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenjang', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang', 100);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('jenjang');
    }
}
