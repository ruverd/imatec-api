<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserShortcutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shortcuts', function (Blueprint $table) {

            $table->integer('user_id')
                ->unsigned()
                ->index()->comment('id do usuário');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->text('route');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `user_shortcuts` comment 'Configuração de atalhos do usuário'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_shortcuts');
    }
}