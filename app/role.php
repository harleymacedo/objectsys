<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';
    public function permissions(){
        return $this->belongsToMany(\App\permission::class);
    }
}
