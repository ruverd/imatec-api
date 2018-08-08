<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_services', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('service_id')->unsigned()->comment('id do serviço');
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onUpdate('cascade');

            $table->string('name')->comment('nome');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_services` comment 'Serviços do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_services');
    }
}
