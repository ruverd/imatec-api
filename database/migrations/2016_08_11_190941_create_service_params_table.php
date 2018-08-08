<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_params', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('email')->comment('email');
            $table->boolean('system')->comment('sistema');
            $table->boolean('fax')->comment('fax');
            $table->boolean('sedex')->comment('sedex');
            $table->boolean('no_cost')->comment('sem custo');
            $table->boolean('pouch')->comment('malote');
            $table->boolean('travel')->comment('viagem');

            $table->integer('service_id')->unsigned()->comment('id do serviço');
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `service_params` comment 'parametros do serviço'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_params');
    }
}
