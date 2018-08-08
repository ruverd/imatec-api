<?php
use Illuminate\Database\Seeder;
use App\Entities\Organization;

/**
 * Class - OrganizationTableSeeder
 *
 * @author Ruver Dornelas <ruverd@gmail.com>
 * @version 1.0 Created
 */
class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Organization::class)->create([
          'id'   => 1,
          'name' => 'Imatec'
        ]);

        factory(Organization::class,50)->create();
    }
}
