<?php

namespace Stocks\Database\Seeders;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Stocks\Database\Factories\ProductFactory::class)->count(10)->create();
    }
}
