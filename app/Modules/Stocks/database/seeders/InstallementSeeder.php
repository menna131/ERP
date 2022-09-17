<?php

namespace Stocks\Database\Seeders;


use Illuminate\Database\Seeder;

class InstallementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Stocks\Database\Factories\InstallementFactory::class)->count(10)->create();
    }
}
