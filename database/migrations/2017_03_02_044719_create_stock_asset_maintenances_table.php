<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_asset_maintenances', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_supplier_id')->unsigned()->comment('id do fornecedor');
            $table->foreign('stock_supplier_id')
                ->references('id')->on('stock_suppliers')
                ->onUpdate('cascade');

            $table->integer('stock_asset_id')->unsigned()->comment('id do patrimônio');
            $table->foreign('stock_asset_id')
                ->references('id')->on('stock_assets')
                ->onUpdate('cascade');

            $table->string('responsible')->comment('responsável');
            $table->date('expected_date')->nullable()->comment('data experada de entrega');
            $table->text('obs')->nullable()->comment('observação');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_asset_maintenances` comment 'Manutenção de patrimônio'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_asset_maintenances');
    }
}