<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_branches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('name')->comment('nome');
            $table->string('cpf_cnpj')->comment('cpf ou cnpj');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_branches` comment 'Filiais do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_branches');
    }
}
