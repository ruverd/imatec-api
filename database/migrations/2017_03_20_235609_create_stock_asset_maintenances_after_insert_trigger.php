<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetMaintenancesAfterInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `stock_asset_maintenances_after_insert` AFTER INSERT ON `stock_asset_maintenances` FOR EACH ROW
                BEGIN
                    UPDATE `stock_assets` SET
                        stock_asset_status_id = 3,
                        updated_at = NEW.created_at
                    WHERE id = NEW.stock_asset_id;
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS  `stock_asset_maintenances_after_insert`');
    }
}
