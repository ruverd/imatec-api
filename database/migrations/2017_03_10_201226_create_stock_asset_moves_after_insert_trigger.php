<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetMovesAfterInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `stock_asset_moves_after_insert` AFTER INSERT ON `stock_asset_moves` FOR EACH ROW
                BEGIN
                    DECLARE TOTAL INTEGER;
                    SELECT count(*) INTO TOTAL FROM stock_asset_moves WHERE stock_asset_id=NEW.stock_asset_id;
                        
                    IF TOTAL > 1 THEN
                        UPDATE `stock_assets` SET
                            stock_spot_id = NEW.stock_spot_id,
                            department_id = NEW.department_id,
                            user_id = NEW.user_id,
                            responsible = NEW.responsible,
                            updated_at = NEW.created_at
                        WHERE id = NEW.stock_asset_id;
                    END IF;
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
        DB::unprepared('DROP TRIGGER IF EXISTS  `stock_asset_moves_after_insert`');
    }
}