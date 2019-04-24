<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reservas'))
        {
            Schema::create('reservas', function (Blueprint $table) {
                $table->increments('id');
                $table->time('inicioReserva');
                $table->time('fimReserva');
                $table->date('dataReserva');
                $table->string('obs_reserva')->nullable();
                $table->timestamps();

                $table->integer('obj_id')->unsigned();
                $table->foreign('obj_id')->references('id')->on('objetos')->onDelete('cascade');

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reservas');
    }
}
