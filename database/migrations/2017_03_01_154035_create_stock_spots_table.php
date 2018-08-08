<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_spots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('codigo do local');
            $table->text('description');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_spots` comment 'Locais de estoque'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_spots');
    }
}
