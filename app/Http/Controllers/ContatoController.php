<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contato;

class ContatoController extends Controller
{
    public function updateLigou($id){
        $contato = Contato::find($id);
        $contato->ligou = $contato->ligou == "N" ? "S" : "N";
        $contato->save();
        return $contato;
    }

    public function index()
    {
        return Contato::with('msgs')->get();
    }

    public function store(Request $request)
    {
        $contato = new Contato();
        $contato->fill($request->all());
        $contato->save();

        return $contato;
    }

    public function show($id)
    {
        return Contato::find( $id );
    }

    public function update(Request $request, $id)
    {
        $contato = Contato::find( $id );
        $contato->fill($request->all());
        $contato->save();
        return $contato;
    }

    public function destroy($id)
    {
        //
        $contato = Contato::find( $id );
        $contato->delete();//Ira remover o registro
        return $contato;
    }
}
