<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_asset_licenses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_asset_id')->unsigned()->comment('id do patrimônio');
            $table->foreign('stock_asset_id')
                ->references('id')->on('stock_assets')
                ->onUpdate('cascade');

            $table->integer('stock_software_license_id')->unsigned()->comment('id da licensas de software');
            $table->foreign('stock_software_license_id')
                ->references('id')->on('stock_software_licenses')
                ->onUpdate('cascade');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_asset_licenses` comment 'Licensas do patrimônio'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_asset_licenses');
    }
}