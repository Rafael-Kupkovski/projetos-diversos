<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    //php artisan make:model Cidade
    //php artisan make:model Estado

    public function estado(){

        return $this->belongsTo('App\Estado');

        //return $this->belongsTo('App\Estado', 'estado_id', 'id');

    }

}
