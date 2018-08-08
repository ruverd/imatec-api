<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ips', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->comment('id do usuário');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('allow')->default(0)->comment('permite acessar mesmo com retrição no papel ou cliente');
            $table->boolean('range')->comment('restrição por range ou não');
            $table->string('ip_start')->comment('ip inicial');
            $table->string('ip_end')->comment('ip final');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `user_ips` comment 'IPs de restrição do usuário'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ips');
    }
}
