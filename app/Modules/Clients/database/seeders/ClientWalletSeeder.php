<?php

namespace Clients\Database\Seeders;

use Clients\Models\ClientWallet;
use Illuminate\Database\Seeder;

class ClientWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Clients\Database\Factories\ClientWalletFactory::class)->count(10)->create();


    }
}
