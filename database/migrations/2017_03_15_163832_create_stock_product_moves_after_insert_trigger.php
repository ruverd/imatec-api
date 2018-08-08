<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockProductMovesAfterInsertTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `stock_product_moves_after_insert` AFTER INSERT ON `stock_product_moves` FOR EACH ROW
                BEGIN
                    DECLARE MOVES INTEGER DEFAULT 0;
                    
                    SET MOVES = (SELECT count(*) FROM stock_product_moves WHERE stock_product_id=NEW.stock_product_id);
                    
                    IF MOVES > 0 THEN
                        IF NEW.stock_move_type_id <> 3 THEN
                            UPDATE `stock_products` SET
                                qtd = NEW.total,
                                updated_at = NEW.created_at
                            WHERE id = NEW.stock_product_id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS  `stock_product_moves_after_insert`');
    }
}
