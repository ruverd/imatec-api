<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_suppliers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->comment('nome da empresa');
            $table->string('cnpj')->comment('cnpj');
            $table->string('website')->comment('site da empresa');
            $table->string('contact')->comment('contato');
            $table->string('phone1')->comment('telefone');
            $table->string('phone2')->comment('telefone');
            $table->string('address')->comment('endereço');
            $table->boolean('maintenance')->comment('se pressta manutenção');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_suppliers` comment 'Forncedores'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_suppliers');
    }
}
