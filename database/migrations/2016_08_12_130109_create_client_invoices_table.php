<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('withholding')->comment('retido na fonte');
            $table->boolean('payday')->comment('dia de pagamento');
            $table->decimal('ir', 5, 2)->comment('importo de renda');
            $table->decimal('pis', 5, 2)->comment('imposto pis');
            $table->decimal('cofins', 5, 2)->comment('imposto cofins');
            $table->decimal('cssl', 5, 2)->comment('imposto cssl');
            $table->decimal('inss', 5, 2)->comment('imposto inss');
            $table->decimal('iss', 5, 2)->comment('imposto iss');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_invoices` comment 'Configuração de dados de faturamento do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_invoices');
    }
}
