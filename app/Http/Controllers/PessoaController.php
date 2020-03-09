<?php

namespace App\Http\Controllers;

use App\Pessoa;//Importar a model Pessoa
use Illuminate\Http\Request;

class PessoaController extends Controller
{

    //php artisan make:controller PessoaController
    public function inserir(Request $request ){

        //Como pegar as informacoes da requisicao// nome, cpf
//        return $request->all() ;
        //return $request->input('nome') ;

        //Inserir um novo registro na tabela pessoas
        $pessoa = new Pessoa(); //Criar um objeto classe Model Pessoa

        $pessoa->nome = $request->input('nome'); //Atribuiu valores aos atribuitos
        $pessoa->cpf = $request->input('cpf');

        $pessoa->save(); //Insert no banco

//        $maria = new Pessoa();
//        $maria->nome = "Maria Dv";
//        $maria->cpf = "9999";
        //$maria->save();//Insert



        return $pessoa;
    }

    public function listar(){

        //Model Pessoa :: all(); Metodo statico da classe model,
        //             // listar todos os registros
//                     // all() => Select * from pessoas;
        return Pessoa::all();
    }

    public function atualizar( $id, Request $request ){
        //Teste....
//        return [
//            $id,
//            $request->all()
//        ];
        //select * from pessoas where id = 2
        //return Pessoa::find( $id );//Buscar um unico registro com o id passado e mostrar na tela

        $pessoa = Pessoa::find( $id );
        $pessoa->nome = $request->input('nome');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->save();

        return $pessoa;

//        echo "Atualizar o  registro: $id ";
//        echo "Atualizar o  registro: ".$id;
    }

    public function remover( $id ){

        $pessoa = Pessoa::find( $id );
        $pessoa->delete();//Ira remover o registro
        return $pessoa;

    }



}
