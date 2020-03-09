<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    //Configurar quias campos pode ser
    //atibuitos em massa
    protected $fillable = ['nome', 'cpf'];

    //Especificar o nome de uma tabela no banco
    //protected $table = 'pessoa_nova';

}
