<?php

namespace Suppliers\Database\Seeders;

use Suppliers\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Supplier::factory(10)->create();
        app(\Suppliers\Database\Factories\SupplierFactory::class)->count(10)->create();

    }
}
