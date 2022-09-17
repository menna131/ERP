<?php

namespace Stocks\Database\Seeders;


use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Stocks\Database\Factories\SaleFactory::class)->count(10)->create();
    }
}
