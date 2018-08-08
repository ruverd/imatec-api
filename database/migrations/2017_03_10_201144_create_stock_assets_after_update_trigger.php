<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockAssetsAfterUpdateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `stock_assets_after_update` AFTER UPDATE ON `stock_assets` FOR EACH ROW
                BEGIN
                    DECLARE TOTAL INTEGER;
                    IF NEW.stock_spot_id <> OLD.stock_spot_id OR NEW.department_id <> OLD.department_id OR NEW.responsible <> OLD.responsible THEN  
                        SELECT count(*) INTO TOTAL FROM stock_asset_moves WHERE stock_asset_id=NEW.id AND stock_spot_id = NEW.stock_spot_id AND department_id = NEW.department_id AND responsible = NEW.responsible;
                        
                        IF TOTAL = 0 THEN
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
                                NEW.updated_at
                            );
                        END IF;
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
        DB::unprepared('DROP TRIGGER `stock_assets_after_update`');
    }
}
