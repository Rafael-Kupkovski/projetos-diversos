<?php

use Illuminate\Database\Seeder;
//use DB;

class EstadoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //
    public function run()
    {

        //Excluir todos os registros da tabela estados
        DB::table('estados')->delete();

        //Inserir o estado Parana
        DB::table('estados')->insert([
            'id' => 1,
            'descricao' => 'Parana',
            'uf' => 'PR'
        ]);

        //Inserir o estado Sao Paulo
        DB::table('estados')->insert([
            'id' => 2,
            'descricao' => 'Sao Paulo',
            'uf' => 'SP'
        ]);
    }
}
