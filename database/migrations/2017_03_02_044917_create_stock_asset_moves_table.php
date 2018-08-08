<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_asset_moves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_asset_id')->unsigned()->comment('id do patrimônio');
            $table->foreign('stock_asset_id')
                ->references('id')->on('stock_assets')
                ->onUpdate('cascade');

            $table->integer('stock_spot_id')->nullable()->unsigned()->comment('id do local');
            $table->foreign('stock_spot_id')
                ->references('id')->on('stock_spots')
                ->onUpdate('cascade');

            $table->integer('stock_asset_status_id')->default(1)->unsigned()->comment('id do status');
            $table->foreign('stock_asset_status_id')
                ->references('id')->on('stock_asset_status')
                ->onUpdate('cascade');

            $table->integer('department_id')->nullable()->unsigned()->comment('id do departamento');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');

            $table->string('responsible')->comment('Responsável pela entrada, retirada ou auditoria');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_asset_moves` comment 'Movimentação de produtos'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_asset_moves');
    }
}
