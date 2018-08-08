<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('service_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('nome');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `service_types` comment 'Tipos de serviços'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}
