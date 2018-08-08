<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('name')->comment('nome');
            $table->string('role')->comment('cargo');
            $table->string('cellphone')->comment('celular');
            $table->string('phone')->comment('telefone');
            $table->string('extension')->comment('ramal');
            $table->string('email')->comment('email');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_contacts` comment 'Contatos no cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_contacts');
    }
}
