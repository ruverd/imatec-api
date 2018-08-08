<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServiceHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_service_history', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('client_service_price_id')->comment('id client/serviço/preço sem chave estrangeira');
            $table->integer('client_service_id')->comment('id client/serviço sem chave estrangeira');

            $table->integer('service_id')->unsigned()->nullable()->comment('id serviço');
            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onUpdate('cascade');

            $table->string('name')->comment('nome');
            $table->string('action_key')->comment('chave de alteração');
            $table->decimal('price', 7, 7)->comment('preço');
            $table->integer('quantity')->comment('quantidade limite');
            $table->decimal('budget', 7, 2)->comment('preço limite');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_service_history` comment 'Histórico de alterações do serviços do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_service_history');
    }
}
