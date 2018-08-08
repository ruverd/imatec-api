<?php

use Illuminate\Database\Seeder;
use App\Entities\StockSoftwareLicenseStatus;

/**
 * Class - StockSoftwareLicenseStatusTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class StockSoftwareLicenseStatusTableSeeder extends Seeder
{
    public function run()
    {
        factory(StockSoftwareLicenseStatus::class)->create([
            'id'   => 1,
            'status' => 'Ativa'
        ]);

        factory(StockSoftwareLicenseStatus::class)->create([
            'id'   => 2,
            'status' => 'Vencida'
        ]);

        factory(StockSoftwareLicenseStatus::class)->create([
            'id'   => 3,
            'status' => 'Desativada'
        ]);

        factory(StockSoftwareLicenseStatus::class)->create([
            'id'   => 4,
            'status' => 'Bloqueada'
        ]);
    }
}