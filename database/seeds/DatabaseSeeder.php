<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //Comando artisan para executar as Seeds
         //php artisan db:seed

         //Se ocorrer o erro de nao encontrar alguma seed
         //composer dump-autoload

         //php artisan db:seed

         //Definir quais seed desejo executar
         //E a ordem
         //$this->call(EstadoSeed::class);
         //$this->call('EstadoSeed');
         $this->call('ProdutoSeed');
    }
}
