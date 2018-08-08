<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAfterUpdateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `users_after_update` AFTER UPDATE ON `users` FOR EACH ROW
                BEGIN
                    IF NEW.password <> OLD.password THEN  
                            INSERT INTO `user_password_histories` ( 
                                user_id,
                                password,
                                created_at, 
                                updated_at
                            ) VALUES ( 
                                NEW.id,
                                OLD.password,
                                NOW(), 
                                NOW()
                            );
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
        DB::unprepared('DROP TRIGGER `users_after_update`');
    }
}
