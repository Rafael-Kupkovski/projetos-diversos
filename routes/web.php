<?php

Route::resource('contatos', 'ContatoController');
Route::get('contatos/ligou/{id}', 'ContatoController@updateLigou');
Route::resource('/contatosmsgs', 'ContatoMsgsController');
Route::get('contatosmsgs/contato/{id}', 'ContatoMsgsController@getMsgContato');

Route::get('/', function () {
    return view('welcome');    
});
