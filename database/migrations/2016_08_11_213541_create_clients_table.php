<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_status_id')->unsigned()->comment('id do status do cliente');
            $table->foreign('client_status_id')
                ->references('id')->on('client_status')
                ->onUpdate('cascade');

            $table->integer('organization_id')->unsigned()->comment('id da organização');
            $table->foreign('organization_id')
                ->references('id')->on('organizations')
                ->onUpdate('cascade');

            $table->integer('invoicecompany_id')->unsigned()->comment('id da empresa de faturamento');
            $table->foreign('invoicecompany_id')
                ->references('id')->on('invoicecompanies')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');

            $table->string('name')->comment('nome');
            $table->string('trade')->unique()->comment('nome fantasia');
            $table->string('cpf_cnpj')->comment('cpf ou cnpj');
            $table->string('ie')->comment('inscrição estadual');
            $table->string('image')->comment('caminho da imagem');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `clients` comment 'Clientes'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
