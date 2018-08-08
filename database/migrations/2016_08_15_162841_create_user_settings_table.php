<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('client_id')->unsigned()->nullable()->comment('id do cliente padrão');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->integer('costcenter_id')->unsigned()->nullable()->comment('id do centro de custo padrão');
            $table->foreign('costcenter_id')
                ->references('id')->on('costcenters')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->integer('page_length')->comment('limite de registro dos filtros');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `user_settings` comment 'Configuração do usuário'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_settings');
    }
}
