<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    //
    protected $fillable = ['nome', 'telefone', 'ligou'];

    public function msgs(){
        return $this->hasMany(ContatoMsg::class);        
    }
}
