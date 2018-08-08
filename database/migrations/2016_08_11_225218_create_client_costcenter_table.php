<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientCostcenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_costcenter', function (Blueprint $table) {
            $table->integer('client_id')
                ->unsigned()
                ->index()->comment('id do cliente');

            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('costcenter_id')
                ->unsigned()
                ->index()->comment('id do centro de custo');

            $table->foreign('costcenter_id')
                ->references('id')->on('costcenters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_costcenter` comment 'Ligação de cliente com centro de custo'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_costcenter');
    }
}
