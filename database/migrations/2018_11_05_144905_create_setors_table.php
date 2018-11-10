<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('setors', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nomeSetor');
                $table->string('descricaoSetor');
                $table->integer('responsavelSetor')->unsigned();
                $table->foreign('responsavelSetor')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setors');
    }
}
