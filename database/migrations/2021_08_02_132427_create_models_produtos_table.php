<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar('codigo');
            $table->varchar('nome');
            $table->doubleval('preco');
            $table->varchar('composicao');
            $table->date('dataCadastro');
            $table->varchar('tamanho');
            $table->int('quantidade');
            $table->varchar('imagem');
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
        Schema::dropIfExists('models_produtos');
    }
}
