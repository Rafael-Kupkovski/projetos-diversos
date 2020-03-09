<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaNovaController extends Controller
{

    //php artisan make:controller PessoaNovaController --resource

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        //return Pessoa::all();
        return Pessoa::paginate( $request->input('qtd') );
//        return "Listar todos registros";
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoa = new Pessoa();
//        $pessoa->nome = "sasada";
//        $pessoa->cpf = "123";
        $pessoa->fill( $request->all() );//Atribuir em massa
        $pessoa->save();


        return $pessoa;
//        return "Inserir um novo registro";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pessoa::find( $id );
//        return "Mostrar um unico registro: ".$id;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::find( $id );
        $pessoa->fill( $request->all() );
        $pessoa->save();
//        return "Atualizar um unico registro: $id";
        return $pessoa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();
        return $pessoa;
//        return "Remover um registro: $id";
    }
}
