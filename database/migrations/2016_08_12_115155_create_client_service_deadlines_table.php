<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServiceDeadlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_service_deadlines', function (Blueprint $table) {
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

            $table->string('request_limit')->comment('Hora limite da solicitação em horas');
            $table->integer('additional_day')->comment('dias contando da solicitação');
            $table->integer('hour_limit')->comment('hora limite');
            $table->string('attendance_limit')->comment('Hora limite do atendimento em horas');
            $table->text('description')->comment('descrição da regra');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_service_deadlines` comment 'Tempo de atendimento do serviços do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_service_deadlines');
    }
}
