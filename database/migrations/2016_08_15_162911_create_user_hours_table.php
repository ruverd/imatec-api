<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_hours', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('day')->comment('dia da semana');
            $table->string('start_work')->comment('hora início do trabalho');
            $table->string('end_work')->comment('hora fim do trabalho');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `user_hours` comment 'Configuração de horas de acesso do usuário'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_hours');
    }
}
