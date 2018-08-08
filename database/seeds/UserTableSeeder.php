<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

/**
 * Class - UserTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class UserTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
          'name' => 'Ruver',
          'email' => 'ruverd@gmail.com',
          'organization_id' => 1,
          'password' => Hash::make('Walnut80#'),
        ]);

        factory(User::class)->create([
            'name' => 'Reginaldo Moreira',
            'email' => 'reginaldo@imatec.com.br',
            'organization_id' => 1,
            'password' => Hash::make('123456')
        ]);

        factory(User::class)->create([
            'name' => 'Jonathan Dyonisio',
            'email' => 'jonathan@imatec.com.br',
            'organization_id' => 1,
            'password' => Hash::make('123456')
        ]);
    }
}
