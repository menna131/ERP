<?php

namespace Suppliers\Database\Seeders;

use Illuminate\Database\Seeder;
use Suppliers\Models\SupplierWalletTransaction;

class SupplierWalletTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // SupplierWalletTransaction::factory(10)->create();
        // SupplierWalletTransaction::create(['reson'=>'test    ']);
        app(\Suppliers\Database\Factories\SupplierWalletTransactionFactory::class)->count(10)->create();

    }
}
