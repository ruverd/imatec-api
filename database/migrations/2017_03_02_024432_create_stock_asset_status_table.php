<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_asset_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->comment('status');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_asset_status` comment 'status dos patrimonios'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_asset_status');
    }
}
