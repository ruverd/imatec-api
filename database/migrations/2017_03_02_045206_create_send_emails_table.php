<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_emails', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('send_email_option_id')->unsigned()->comment('id das opções de envio de email');
            $table->foreign('send_email_option_id')
                ->references('id')->on('send_email_options')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');

            $table->string('email')->comment('emails');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `send_emails` comment 'Envio de email por usuário'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_emails');
    }
}