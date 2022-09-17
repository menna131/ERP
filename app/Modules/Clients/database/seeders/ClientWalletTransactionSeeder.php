<?php

namespace Clients\Database\Seeders;

use Illuminate\Database\Seeder;
use Clients\Models\ClientWalletTransaction;

class ClientWalletTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Clients\Database\Factories\ClientWalletTransactionFactory::class)->count(10)->create();
    }
}
