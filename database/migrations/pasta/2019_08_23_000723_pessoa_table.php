<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        https://laravel.com/docs/5.8/migrations
        //php artisan make:migration PessoaTable

        //php artisan migrate

        //php artisan make:model Pessoa

        Schema::create('pessoas', function (Blueprint $table){

            //Campos que ira conter na tabela
            $table->increments('id');//PK e Autoincrement
            $table->string('nome', 150);//Varchar
            $table->string('cpf', 11);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoas');
    }
}
