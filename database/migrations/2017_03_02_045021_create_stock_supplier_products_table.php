<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSupplierProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_supplier_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_supplier_id')->unsigned()->comment('id do fornecedor');
            $table->foreign('stock_supplier_id')
                ->references('id')->on('stock_suppliers')
                ->onUpdate('cascade');

            $table->integer('stock_product_id')->unsigned()->comment('id do produto');
            $table->foreign('stock_product_id')
                ->references('id')->on('stock_products')
                ->onUpdate('cascade');

            $table->integer('stock_software_id')->unsigned()->comment('id do software');
            $table->foreign('stock_software_id')
                ->references('id')->on('stock_softwares')
                ->onUpdate('cascade');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_supplier_products` comment 'Produtos do fornecedor'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_supplier_products');
    }
}
