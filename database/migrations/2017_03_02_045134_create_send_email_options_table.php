<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendEmailOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_email_options', function (Blueprint $table) {
            $table->increments('id');

            $table->string('options')->comment('opções');
            $table->string('description')->comment('descrição');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `send_email_options` comment 'Opções de envio de email'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('send_email_options');
    }
}
