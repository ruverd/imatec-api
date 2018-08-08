<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockProductMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_product_moves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_product_id')->unsigned()->comment('id do produto');
            $table->foreign('stock_product_id')
                ->references('id')->on('stock_products')
                ->onUpdate('cascade');

            $table->integer('stock_spot_id')->nullable()->unsigned()->comment('id do local');
            $table->foreign('stock_spot_id')
                ->references('id')->on('stock_spots')
                ->onUpdate('cascade');

            $table->integer('stock_move_type_id')->unsigned()->comment('id do tipo de movimentação');
            $table->foreign('stock_move_type_id')
                ->references('id')->on('stock_move_types')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');

            $table->integer('qtd')->comment('quantidade removida ou adicionada');
            $table->integer('total')->default(0)->comment('quantidade total após aquela movimentação');
            $table->string('responsible')->nullable()->comment('Responsável pela entrada, retirada ou auditoria');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_product_moves` comment 'Movimentação de produtos'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_product_moves');
    }
}
