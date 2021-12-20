<?php

namespace Modules\Advertisement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdvertisementModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \Modules\Advertisement\Entities\Advertisement::factory(1000)->create();
        // $this->call("OthersTableSeeder");
    }
}
