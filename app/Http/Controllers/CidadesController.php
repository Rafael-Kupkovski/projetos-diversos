<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade; //Model
use DB;

class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Cidade::all();
        // return Cidade::find(3);
//        return DB::select("select * from cidades where id = 1 ");

//        return Cidade::all();
        $cidades = Cidade::with('estado')->get();
        $qtd = count( $cidades );
        $qtd = 0;
        if( $qtd > 0 ){
            return response()->json( $cidades, 200 );
        }else{
            return response()->json( ['mensagem' => 'Nao possui registros'], 404 );
        }

        return response()->json( $cidades, 404 );
        //return $cidades;
//        $ob = DB::table('cidades')->where('id', 4)->first();
//            var_dump(  );
//        return ['dados'=>$ob];
//            return DB::select('select * from cidades');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
