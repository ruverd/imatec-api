<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique()->comment('código do patrimônio');

            $table->integer('stock_product_id')->unsigned()->comment('id do produto');
            $table->foreign('stock_product_id')
                ->references('id')->on('stock_products')
                ->onUpdate('cascade');

            $table->integer('stock_asset_status_id')->default(1)->unsigned()->comment('id do status');
            $table->foreign('stock_asset_status_id')
                ->references('id')->on('stock_asset_status')
                ->onUpdate('cascade');

            $table->integer('stock_spot_id')->nullable()->unsigned()->comment('id do local');
            $table->foreign('stock_spot_id')
                ->references('id')->on('stock_spots')
                ->onUpdate('cascade');

            $table->integer('department_id')->unsigned()->comment('id do departamento');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');

            $table->string('model')->nullable()->comment('modelo');
            $table->string('ip')->nullable()->comment('ip');
            $table->string('responsible')->comment('responsável');

            $table->text('obs')->nullable()->comment('observação');
            $table->decimal('price', 7, 2)->nullable()->comment('preço');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_assets` comment 'Patrimônio do estoque'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_assets');
    }
}
