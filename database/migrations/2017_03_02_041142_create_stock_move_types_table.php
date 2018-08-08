<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockMoveTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_move_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->comment('tipos');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_move_types` comment 'tipos de movimentação do estoque'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_move_types');
    }
}
