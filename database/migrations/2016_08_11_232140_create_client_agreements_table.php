<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_agreements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('costcenter_id')->unsigned()->comment('id do centro de custo');
            $table->foreign('costcenter_id')
                ->references('id')->on('costcenters')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('code')->unique()->comment('codigo');
            $table->string('file')->unique()->comment('caminho do arquivo');
            $table->date('agreement_date')->comment('data de contrato');
            $table->date('due_date')->comment('data de vencimento');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_agreements` comment 'Contratos do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_agreements');
    }
}
