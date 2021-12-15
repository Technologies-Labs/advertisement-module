<?php

namespace Modules\AdvertisementModule\Database\Seeders;

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

        \Modules\AdvertisementModule\Entities\Advertisement::factory(1000)->create();
        // $this->call("OthersTableSeeder");
    }
}
