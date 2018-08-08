<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_ips', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned()->comment('id do cliente');
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('range')->comment('restrição por range ou não');
            $table->string('ip_start')->comment('ip inicial');
            $table->string('ip_end')->comment('ip final');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `client_ips` comment 'IPs de restrição do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_ips');
    }
}
