<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('nome');
            $table->string('description')->comment('descrição');

            $table->integer('unit_id')->unsigned()->comment('id de unidades de medidas');
            $table->foreign('unit_id')
                ->references('id')->on('units')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('service_type_id')->unsigned()->comment('id do tipo de serviço');
            $table->foreign('service_type_id')
                ->references('id')->on('service_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('department_id')->unsigned()->comment('id do departamento');
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `services` comment 'serviços'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('services', function (Blueprint $table) {
//            $table->dropForeign('unit_id_foreign');
//            $table->dropForeign('service_type_id_foreign');
//            $table->dropForeign('department_id_foreign');
//        });

        Schema::dropIfExists('services');
    }
}
