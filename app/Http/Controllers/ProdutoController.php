<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;//importar model
use DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $produto = new Produto();
        $produto->fill( $request->all() );
        $produto->save();
        return $produto;
    }


    public function show($id)
    {
        return Produto::find( $id );
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
        $produto = Produto::find( $id );
        $produto->fill( $request->all() );
        $produto->save();

        return $produto;
//        return [
//          'id' => $id,
//          'parametros' => $request->all()
//        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find( $id );
        $produto->delete();
        return $produto;
    }

    public function pesquisa( $nomeProduto ){

        $produtos = DB::select(
            "select * from produtos where nome like '%".$nomeProduto."%' "
        );
        return $produtos;

    }
}
