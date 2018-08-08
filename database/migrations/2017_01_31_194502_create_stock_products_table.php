<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_category_id')->unsigned()->comment('id da categoria');
            $table->foreign('stock_category_id')
                ->references('id')->on('stock_categories')
                ->onUpdate('cascade');

            $table->integer('unit_id')->unsigned()->comment('id da unidade de medida');
            $table->foreign('unit_id')
                ->references('id')->on('units')
                ->onUpdate('cascade');

            $table->string('name')->comment('nome');
            $table->integer('max')->default(2)->comment('máximo em estoque');
            $table->integer('min')->default(1)->comment('mínimo em estoque');
            $table->boolean('asset')->default(0)->comment('produto é um ativo');
            $table->integer('purchase')->default(1)->comment('quantidade a ser comprada');
            $table->integer('qtd')->default(0)->comment('quantidade em estoque');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_products` comment 'Produtos do estoque'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_products');
    }
}
