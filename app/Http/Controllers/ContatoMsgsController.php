<?php

namespace App\Http\Controllers;

use App\ContatoMsg;
use Illuminate\Http\Request;

class ContatoMsgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $contatoMsgs = new ContatoMsg();
        $contatoMsgs->fill($request->all());
        $contatoMsgs->data_envio = date('Y-m-d H:i:s');
        $contatoMsgs->save();
        return $contatoMsgs;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return ContatoMsg::find($id);
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
        $contatoMsgs = ContatoMsg::find( $id );
        $contatoMsgs->fill($request->all());
        $contatoMsgs->save();
        return $contatoMsgs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contatoMsgs = ContatoMsg::find( $id );
        $contatoMsgs->delete();//Ira remover o registro
        return $contatoMsgs;
    }

    public function getMsgContato($id)
    {
        return ContatoMsg::where('contato_id', $id)->get();
    }
}
