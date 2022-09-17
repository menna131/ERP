<?php

namespace Suppliers\Database\Seeders;

use Suppliers\Models\SupplierWallet;
use Illuminate\Database\Seeder;

class SupplierWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // SupplierWallet::factory(10)->create();
        // SupplierWallet::create(['total_paid'=>'test']);
        app(\Suppliers\Database\Factories\SupplierWalletFactory::class)->count(10)->create();

    }
}
