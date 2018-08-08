<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockSoftwareLicenseStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_software_license_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->comment('status');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `stock_software_license_status` comment 'status da licensa de um programa'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_software_license_status');
    }
}
