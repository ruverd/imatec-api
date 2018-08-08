<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSoftwareLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_software_licenses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('stock_software_id')->unsigned()->comment('id do programa');
            $table->foreign('stock_software_id')
                ->references('id')->on('stock_software_licenses')
                ->onUpdate('cascade');

            $table->integer('stock_software_license_status_id')->unsigned()->comment('id do status da licensa');
            $table->foreign('stock_software_license_status_id')
                ->references('id')->on('stock_software_license_status')
                ->onUpdate('cascade');

            $table->string('serial')->nullable()->comment('número da chave do programa');
            $table->integer('expiration')->comment('dias para expiração');
            $table->integer('qtd')->comment('quantidade de licensas');
            $table->decimal('price', 7, 2)->nullable()->comment('preço');
            $table->text('obs')->nullable()->comment('observação sobre a licença');
            $table->boolean('auto_payment')->default(1)->comment('pagamento automático');
            $table->date('agreement_date')->nullable()->comment('data de contrato');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_software_licenses` comment 'status da licensa de um programa'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_software_licenses');
    }
}
