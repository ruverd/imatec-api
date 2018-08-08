<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockProductMovesBeforeInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `stock_product_moves_before_insert` BEFORE INSERT ON `stock_product_moves` FOR EACH ROW
                BEGIN
                    DECLARE TOTAL_CURRENT INTEGER DEFAULT 0;
                    DECLARE TOTAL INTEGER DEFAULT 0;
                    
                    SET TOTAL_CURRENT = (SELECT qtd FROM stock_products WHERE id=NEW.stock_product_id);
                    
                    IF NEW.stock_move_type_id = 1 THEN
                        SET TOTAL = TOTAL_CURRENT + NEW.qtd;
                    ELSEIF NEW.stock_move_type_id = 3 THEN
                        SET TOTAL = NEW.qtd;
                    ELSE
                        SET TOTAL = TOTAL_CURRENT - NEW.qtd;
                        
                        IF TOTAL < 0 THEN
                            SET TOTAL = 0;
                        END IF;
                    END IF;
                    
                    SET new.total = TOTAL;
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
        DB::unprepared('DROP TRIGGER IF EXISTS  `stock_product_moves_before_insert`');
    }
}
