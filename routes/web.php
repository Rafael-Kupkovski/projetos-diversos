<?php


Route::resource('/contatos', 'ContatoController');
Route::get('/contatos/ligou/{id}', 'ContatoController@updateLigou');

Route::resource('/contatosmsgs', 'ContatoMsgsController');

Route::get('contatosmsgs/contato/{id}', 'ContatoMsgsController@getMsgContato');

Route::resource('/produtos', 'ProdutoController');
// Route::get('/produtos/pesquisa/{nomeProduto}', 'ProdutoController@pesquisa');


Route::resource('/pessoas/nova', 'PessoaNovaController');


Route::post('/pessoas', 'PessoaController@inserir');
Route::get('/pessoas', 'PessoaController@listar');
//Route::get('/pessoas/listar', 'PessoaController@listar');

//Minha ira receber um parametro no lugar {id}
Route::put('/pessoas/{id}', 'PessoaController@atualizar');
//Exemplo de rota: localhost:8000/pessoas/2
//Exemplo de rota: localhost:8000/pessoas/3

Route::delete('/pessoas/remover/{id}', 'PessoaController@remover');





Route::get('/estados', 'EstadoController@listar' );
//Route::put('/estados', 'EstadoController@atualizar' );
//Route::post('/estados', 'EstadoController@novo' );
//Route::delete('/estados', 'EstadoController@excluir' );
Route::get('/estados/inserir', 'EstadoController@inserir' );


Route::get('/', function () {
    return view('welcome');
    // return [
    //     "nome" => "Maria da Silva",
    //     "idade"=> 12
    // ];
});

Route::get( '/ola', function(){
    $mensagem = "Vamos trabalhar com Laravel !!!";

    // echo $mensagem;
    return $mensagem;
});


//Rota para listar as cidades
//Route::get('/cidades', 'CidadesController@index');
Route::resource('/cidades', 'CidadesController');

//
//Route::get("/git", function (){
//    echo '
//    //Adicionar todos arquivos que desejo realizar o commit
//    <br>git add *
//
//    <br><br>//Serve para descrever o que foi feito..
//    <br>git commit -m "Mensagem descrevendo o que foi feito"
//
//    <br><br>//Enviar codigo para o repositorio
//    <br>git push
//    ';
//});
