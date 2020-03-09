<?php

namespace App\Http\Controllers;

use App\ContatoMsg;
use Illuminate\Http\Request;

class ContatoMsgsController extends Controller
{

    public function getMsgContato($id)
    {
        return ContatoMsg::where('contato_id', $id)->get();
    }

    public function store(Request $request)
    {
        $contatoMsgs = new ContatoMsg();
        $contatoMsgs->fill($request->all());
        $contatoMsgs->data_envio = date('Y-m-d H:i:s');
        $contatoMsgs->save();
        return $contatoMsgs;
    }

    public function show($id)
    {  
        return ContatoMsg::find($id);
    }

    public function update(Request $request, $id)
    {
        $contatoMsgs = ContatoMsg::find( $id );
        $contatoMsgs->fill($request->all());
        $contatoMsgs->save();
        return $contatoMsgs;
    }

    public function destroy($id)
    {
        $contatoMsgs = ContatoMsg::find( $id );
        $contatoMsgs->delete();//Ira remover o registro
        return $contatoMsgs;
    }
}
