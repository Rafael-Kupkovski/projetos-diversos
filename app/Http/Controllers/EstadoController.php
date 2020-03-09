<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cidade;
use App\Estado;

class EstadoController extends Controller
{



    public function listar(){

//        $estados = DB::select("select * from estados");
        //$estados = Cidade::find(3);
//        $estados = array( ["desc" => "parana" ] , [ "desc" => "sao paulo" ] );
//        return "Listar registros da tabela estados";
//        $estados = Estado::all();

//        return $estados;
//        return Estado::with('cidades')->paginate(1);
        return Estado::all();
    }





    public function inserir( Request $request ){

        DB::insert("INSERT INTO estados (descricao, uf) VALUES ( ?, ? )",

            [$request->input('desc'), $request->input('uf')]
        );

        return $request->input('desc');

        //  return "Funcao inserir";
        //  return $request->all();
    }

}

//php artisan make:controller EstadoController









