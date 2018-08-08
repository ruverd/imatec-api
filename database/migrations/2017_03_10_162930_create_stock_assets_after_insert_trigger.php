<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStockAssetsAfterInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `stock_assets_after_insert` AFTER INSERT ON `stock_assets` FOR EACH ROW
                BEGIN
                    INSERT INTO `stock_asset_moves` ( 
                        stock_asset_id,
                        stock_spot_id,
                        stock_asset_status_id,
                        department_id,
                        user_id,
                        responsible,
                        created_at
                    ) VALUES ( 
                        NEW.id,
                        NEW.stock_spot_id,
                        NEW.stock_asset_status_id,
                        NEW.department_id,
                        NEW.user_id,
                        NEW.responsible,
                        NEW.created_at
                    );
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
        DB::unprepared('DROP TRIGGER `stock_assets_after_insert`');
    }
}
