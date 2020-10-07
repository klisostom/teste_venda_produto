<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoTipoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_tipo_produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->double('percentual_imposto', 3, 2);
            $table->double('preco_vendido', 8, 2);

            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('tipo_produto_id')->constrained('tipo_produtos');

            $table->timestamps(0);
            $table->softDeletesTz(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_tipo_produtos');
    }
}
