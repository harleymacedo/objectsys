<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class objeto extends Model
{
    use Notifiable;

    protected $fillable = [
        'nomeObj','descricaoObj','situacaoObj','categoriaObj'
    ];

}
