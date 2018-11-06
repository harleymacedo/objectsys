<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class setor extends Model
{
    use Notifiable;

    protected $fillable = [
        'nomeSetor','descricaoSetor','responsavelSetor',
    ];
}
