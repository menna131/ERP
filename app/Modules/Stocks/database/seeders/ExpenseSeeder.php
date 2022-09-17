<?php

namespace Stocks\Database\Seeders;

use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Stocks\Database\Factories\ExpenseFactory::class)->count(10)->create();
    }
}
