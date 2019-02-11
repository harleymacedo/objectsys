<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetorObjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('setor_objeto'))
        {
            Schema::create('setor_objeto', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('objeto_id')->unsigned();
                $table->foreign('objeto_id')->references('id')->on('objetos')->onDelete('cascade');

                $table->integer('setor_id')->unsigned();
                $table->foreign('setor_id')->references('id')->on('setors')->onDelete('cascade');
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
        //
    }
}
