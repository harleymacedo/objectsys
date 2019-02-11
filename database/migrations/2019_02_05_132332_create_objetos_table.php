<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('objetos'))
        {
            Schema::create('objetos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nomeObj');
                $table->string('descricaoObj');
                $table->string('situacaoObj');
                $table->string('categoriaObj');
                $table->integer('setorObj')->unsigned();
                $table->foreign('setorObj')->references('id')->on('setors')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetos');
    }
}
