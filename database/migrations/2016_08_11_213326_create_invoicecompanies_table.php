z<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicecompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicecompanies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->comment('nome');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `invoicecompanies` comment 'Empresas de faturamento'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoicecompanies');
    }
}
