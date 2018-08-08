<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostcentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costcenters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 50)->unique()->comment('código');
            $table->string('name', 50)->comment('nome');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `costcenters` comment 'Centro de custo usado para separar areas do cliente'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costcenters');
    }
}
