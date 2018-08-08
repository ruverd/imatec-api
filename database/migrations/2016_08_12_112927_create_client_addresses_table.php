<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_branch_id')->unsigned()->comment('id da filial do cliente');
            $table->foreign('client_branch_id')
                ->references('id')->on('client_branches')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('zipcode')->comment('cep');
            $table->string('address')->comment('endereço');
            $table->string('number')->comment('número');
            $table->string('addition')->comment('complemento');
            $table->string('neighborhood')->comment('bairro');
            $table->string('city')->comment('cidade');
            $table->string('state')->comment('estado');
            $table->boolean('delivery')->comment('Endereço de entrega');
            $table->boolean('billing')->comment('Endereço de cobrança');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_addresses` comment 'Endereços do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_addresses');
    }
}
