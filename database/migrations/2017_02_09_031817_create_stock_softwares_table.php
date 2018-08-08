<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_softwares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('nome');
            $table->string('version')->comment('versão');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_softwares` comment 'Programas'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_softwares');
    }
}
