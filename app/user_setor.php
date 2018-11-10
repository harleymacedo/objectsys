<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class user_setor extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id','setor_id',
    ];
}
