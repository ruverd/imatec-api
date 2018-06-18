<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('organization_id')->unsigned()->default(1)->comment('chave com organização');
            $table->foreign('organization_id')
                  ->references('id')->on('organizations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('user_status_id')->unsigned()->default(1)->comment('id do status do usuário');
            $table->foreign('user_status_id')
                ->references('id')->on('user_status')
                ->onUpdate('cascade');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
