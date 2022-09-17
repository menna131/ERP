<?php

namespace Clients\Database\Seeders;

use Clients\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Client::factory(10)->create();
        app(\Clients\Database\Factories\ClientFactory::class)->count(10)->create();

    }
}
