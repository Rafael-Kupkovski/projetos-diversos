<?php

use Illuminate\Database\Seeder;

class ProdutoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'id' => 1,
            'nome' => 'Mouse',
            'valor' => 100,
            'qtd' => 10
        ]);

        DB::table('produtos')->insert([
            'id' => 2,
            'nome' => 'Teclado',
            'valor' => 200,
            'qtd' => 5
        ]);
    }
}
