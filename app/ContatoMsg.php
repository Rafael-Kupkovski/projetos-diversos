<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoMsg extends Model
{
    //
    protected $table = 'contato-msgs';

    protected $fillable = ['contato_id', 'msg'];

    public function contato(){
        return $this->belongsTo('App\Contato', 'contato_id', 'id');
    }
}
