<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServicePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_service_prices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_service_id')->unsigned()->comment('id do cliente/serviço');
            $table->foreign('client_service_id')
                ->references('id')->on('client_services')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('costcenter_id')->unsigned()->comment('id do centro de custo');
            $table->foreign('costcenter_id')
                ->references('id')->on('costcenters')
                ->onUpdate('cascade');

            $table->decimal('price', 7, 7)->comment('preço');
            $table->integer('quantity')->comment('quantidade limite');
            $table->decimal('budget', 7, 2)->comment('preço limite');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_service_prices` comment 'Preços e variações do serviços do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_service_prices');
    }
}
