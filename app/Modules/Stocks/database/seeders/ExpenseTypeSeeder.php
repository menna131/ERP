<?php

namespace Stocks\Database\Seeders;


use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Stocks\Database\Factories\ExpenseTypeFactory::class)->count(10)->create();
    }
}
