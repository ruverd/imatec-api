<?php

use Illuminate\Database\Seeder;
use App\Entities\UserStatus;

/**
 * Class - UserStatusTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class UserStatusTableSeeder extends Seeder
{
    public function run()
    {
        factory(UserStatus::class)->create([
            'id'   => 1,
            'status' => 'Ativo'
        ]);

        factory(UserStatus::class)->create([
            'id'   => 2,
            'status' => 'Inativo'
        ]);

        factory(UserStatus::class)->create([
            'id'   => 3,
            'status' => 'Bloqueado Pagamento'
        ]);

        factory(UserStatus::class)->create([
            'id'   => 4,
            'status' => 'Bloqueado Tentativa de Acesso'
        ]);
    }
}