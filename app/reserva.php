<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class reserva extends Model
{
    use Notifiable;

    protected $fillable = [
        'inicioReserva','fimReserva','obs_reserva','obj_id','user_id'
    ];
}
