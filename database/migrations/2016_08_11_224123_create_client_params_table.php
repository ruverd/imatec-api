<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_params', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onUpdate('cascade');

            $table->boolean('local')->comment('Se esse cliente trabalha localmente');
            $table->boolean('web')->comment('Se esse cliente trabalha na web');
            $table->boolean('hosting')->comment('Tipo de arredondamento');
            $table->integer('scan')->comment('Limite de imagens na digitalização');
            $table->decimal('commission', 5, 2)->comment('Percentual de comissão do vendedor');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_params` comment 'Parametros do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_params');
    }
}
