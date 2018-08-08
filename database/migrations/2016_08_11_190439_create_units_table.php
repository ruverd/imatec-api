<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->comment('nome');
            $table->string('code', 5)->unique()->comment('código');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `units` comment 'unidade de medida'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
