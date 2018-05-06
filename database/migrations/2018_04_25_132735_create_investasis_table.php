<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('proyek_id')->unsigned();
            $table->integer('no_rekening');
            $table->integer('jml_investasi');
            $table->integer('jml_keuntungan');
            $table->integer('konfirmasi');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('proyek_id')->references('id')->on('proyeks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investasis');
    }
}
