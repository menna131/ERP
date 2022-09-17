<?php

namespace Suppliers\Database\Seeders;

// use Suppliers\Models\PriceList;
use Illuminate\Database\Seeder;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Suppliers\Database\Factories\PriceListFactory::class)->count(10)->create();


    }
}
